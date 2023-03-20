<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {return [
            'user' => ['required', 'string'],
            'password' => ['required', 'string'],  ];}
    public function authenticate()
    {
        $this->ensureIsNotRateLimited();
        $userN='username';
        if(strpos($this->input("user"),"@")!=false){
        $userN='email'; }
        if (! Auth::attempt([$userN=>$this->input("user"),"password"=>$this->input("password")],
         $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());
            throw ValidationException::withMessages([
                'user' => __('auth.failed'),
            ]);
        }
        RateLimiter::clear($this->throttleKey());
    }
    public function ensureIsNotRateLimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }
        event(new Lockout($this));
        $seconds = RateLimiter::availableIn($this->throttleKey());
        throw ValidationException::withMessages([
            'user' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }
    public function throttleKey()
    {
        return Str::lower($this->input('user')).'|'.$this->ip();
    }
}
