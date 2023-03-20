<x-guest-layout>



    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors('mycolor');" :class="{ 'dark': isDark}">
        <!-- Loading screen -->
        <x-loading />
        <div
          class="flex flex-col items-center justify-center min-h-screen p-4 space-y-4 antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light"
        >
          <!-- Brand -->
         <x-application-logo class="h-24 w-24" />
    <main>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <h1 class="sr-only">Request new password</h1>
        <div class="w-full max-w-sm px-4 py-6 space-y-6 bg-white rounded-md dark:bg-darker">
          <p class="text-sm font-medium text-center text-gray-500 dark:text-gray-400">
        هل نسيت كلمة المرور الخاصة بك ؟ هنا يمكنك استعادة كلمة المرور بسهولة
        </p>
          <form  method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf
            <div class="space-y-2">
                <x-label for="email" :value="__('Email')" />
                <x-input-with-icon-wrapper>
                    <x-slot name="icon">
                        <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5" />
                    </x-slot>
                    <x-input withicon id="email" class="block w-full" type="email" name="email"
                        :value="old('email')" required autofocus placeholder="{{ __('Email') }}" />
                </x-input-with-icon-wrapper>
            </div>
            <div>
              <button
                type="submit"
                class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker"
              >
              ارسال طلب استعادة كلمة المرور
              </button>
            </div>
          </form>

          <!-- Reset password link -->
          <div class="text-sm text-gray-600 dark:text-gray-400">
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">عودة لتسجيل الدخول</a>
          </div>
        </div>
      </main>
        </div>
    </div>
{{--
    <x-auth-card>
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="grid gap-6">
                <!-- Email Address -->
                <div class="space-y-2">
                    <x-label for="email" :value="__('Email')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="email" class="block w-full" type="email" name="email"
                            :value="old('email')" required autofocus placeholder="{{ __('Email') }}" />
                    </x-input-with-icon-wrapper>
                </div>

                <div>
                    <x-button class="justify-center w-full">
                        {{ __('Email Password Reset Link') }}
                    </x-button>
                </div>
            </div>
        </form>
    </x-auth-card> --}}
</x-guest-layout>
