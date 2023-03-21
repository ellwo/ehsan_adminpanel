<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UploadeController;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $user=User::find(auth()->user()->id);

        if($request->has('change_language'))
        {app()->setLocale($request['change_language']);

        }
         if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        if(isset($request['ban'] )&& $request["ban"]==1)
        {
            $users=User::onlyBanned()->get();

        }
        else
        $users = User::with('roles')->get();

        return view('admin.users.index', compact('users'));
    }


    public function ban(User $user)
    {
        $roles = Role::get()->pluck('name', 'name');

        return view('admin.users.ban-user',compact('user','roles'));
        # code...
    }
    public function ban_store(Request $request,User $user)
    {


        if($request->has('type') && $request['type']=="unban")
        $user->unban();
        else
        $user->ban(["expired_at"=>$request['expired_at'],'comment'=>$request["comment"]]);

        return redirect()->route('admin.users.index');
        return view('admin.users.ban-user',compact('user'));
        # code...
    }


    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $user = User::create($request->all());
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {


        if (! Gate::allows('users_manage')) {
            return abort(401);
        }


        if($request['username'] != $user->username )
        $this->validate($request,[
            'username' =>['min:4','regex:/^[a-z\d_.]{2,20}$/i','required','string', 'max:191', 'unique:users'],
        ]);
        if($request['email'] != $user->email )
        $this->validate($request,[
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
        ]);
        if($request['phone'] != $user->phone )
        $this->validate($request,[
            'phone' => ['required', 'max:9','min:9','unique:users,phone'],
        ]);

        if($request['password']!=null)
       $user->update([
        'name'=>$request['name'],
        'username'=>$request['username'],
        'email'=>$request['email'],
        'password'=>Hash::make($request['password'])
       ]);

       else
       $user->update([
        'name'=>$request['name'],
        'username'=>$request['username'],
        'email'=>$request['email'],
        'phone'=>$request["phone"]
       ]);


        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }



        // $user->bussinses()->delete();
        // $user->products()->delete();
        // $user->services()->delete();

        // $upld= new UploadeController();
        // $upld->delete_file($user->avatar);
        // $user->services()->delete();
        // $user->orders()->delete();
        // $user->chats()->delete();
               $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        User::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

}
