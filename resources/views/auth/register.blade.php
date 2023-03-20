<x-guest-layout>
    {{-- <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="grid gap-6">
                <!-- Name -->
                <div class="space-y-2">
                    <x-label for="name" :value="__('Name')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="name" class="block w-full" type="text" name="name" :value="old('name')"
                            required autofocus placeholder="{{ __('Name') }}" />
                    </x-input-with-icon-wrapper>
                </div>

                <!-- Email Address -->
                <div class="space-y-2">
                    <x-label for="email" :value="__('Email')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="email" class="block w-full" type="email" name="email"
                            :value="old('email')" required placeholder="{{ __('Email') }}" />
                    </x-input-with-icon-wrapper>
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <x-label for="password" :value="__('Password')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="password" class="block w-full" type="password" name="password" required
                            autocomplete="new-password" placeholder="{{ __('Password') }}" />
                    </x-input-with-icon-wrapper>
                </div>

                <!-- Confirm Password -->
                <div class="space-y-2">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="password_confirmation" class="block w-full" type="password"
                            name="password_confirmation" required placeholder="{{ __('Confirm Password') }}" />
                    </x-input-with-icon-wrapper>
                </div>

                <div>
                    <x-button class="justify-center w-full gap-2">
                        <x-heroicon-o-user-add class="w-6 h-6" aria-hidden="true" />
                        <span>{{ __('Register') }}</span>
                    </x-button>
                </div>

                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Already registered?') }}
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">
                        {{ __('Login') }}
                    </a>
                </p>
            </div>
        </form>
    </x-auth-card> --}}
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors(color);" :class="{ 'dark': isDark}">
        <!-- Loading screen -->
        <div
          x-ref="loading"
          class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-primary-darker"
        >
          Loading.....
        </div>
        <div class="flex flex-col items-center justify-center min-h-screen p-4 space-y-4 antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light" >
          <!-- Brand -->
          <x-application-logo/>
          <main>
            <div class="w-full max-w-sm px-4 py-6 space-y-6 bg-white rounded-md dark:bg-darker">
              <h1 class="text-xl font-semibold text-center">انشاء حساب</h1>
              <form action="{{route('register')}}" x-data='{isshow:false}' method="POST" class="space-y-6 ">

                @csrf
                <div class="space-y-2">
                    <x-label for="name" :value="__('الاسم')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="name" class="block w-full" type="text" name="name" :value="old('name')"
                            required autofocus placeholder="{{ __('الاسم') }}" />
                    </x-input-with-icon-wrapper>
                </div>

                <div class="space-y-2 text-danger">
                    <x-label for="email" :value="__('البريد الالكتروني')" />
                    <x-input-with-icon-wrapper >
                        <x-slot name="icon">
                            <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input  withicon id="email" class="block w-full" type="email" name="email"
                            :value="old('email')" required placeholder="{{ __('Email@example.com') }}" />
                    </x-input-with-icon-wrapper>

                    @error("email")

                    <hr class="border-2 text-danger bg-danger border-danger"/>
                    <span class="text-xs text-danger ">{{$message}}</span>
                    @enderror
                </div>
                  <!-- Password -->
                  <div class="space-y-2" >
                    <x-label for="password" :value="__('كلمة المرور')" />
                    <x-input-with-icon-wrapper >
                        <x-slot name="icon">
                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon withrighticon id="password" class="block w-full"  x-bind:type=" isshow ? 'text' : 'password'" name="password" required
                            autocomplete="new-password"  placeholder="{{ __('كلمة المرور') }}" />
                            <x-slot name="righticon">
                                <button type="button" @click="isshow=!isshow" class="z-30 ">
                                    <x-heroicon-o-eye x-show="!isshow" aria-hidden="true" class="w-5 h-5 " />
                                    <x-heroicon-o-eye-off x-show="isshow" aria-hidden="true" class="w-5 h-5 " />
                                </button>
                            </x-slot>

                        </x-input-with-icon-wrapper>

                        @error("password")

                    <hr class="border-2 text-danger bg-danger border-danger"/>
                    <span class="text-xs text-danger ">{{$message}}</span>
                    @enderror

                </div>

                <!-- Confirm Password -->
                <div class="space-y-2">
                    <x-label for="password_confirmation" :value="__('تاكيد كلمة المرور')" />
                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="password_confirmation" x-bind:type=" isshow ? 'text' : 'password'" class="block w-full"
                            name="password_confirmation" required placeholder="{{ __('تاكيد كلمة المرور') }}" />
                            <x-slot name="righticon">
                                <button type="button" @click="isshow=!isshow" class="z-30 ">
                                    <x-heroicon-o-eye x-show="!isshow" aria-hidden="true" class="w-5 h-5 " />
                                    <x-heroicon-o-eye-off x-show="isshow" aria-hidden="true" class="w-5 h-5 " />
                                </button>
                            </x-slot>

                        </x-input-with-icon-wrapper>
                    @error("password_confirmation")

                    <hr class="border-2 text-danger bg-danger border-danger"/>
                    <span class="text-xs text-danger ">{{$message}}</span>
                    @enderror

                </div>





                <div dir="rtl" class="flex items-center justify-between">
                  <!-- Remember me toggle -->
                  <label class="flex items-center">
                    <div  class="relative inline-flex items-center">
                      <input
                        type="checkbox"
                        name="accept_terms"
                        required
                        class="w-10 h-4 transition bg-gray-200 border-none rounded-full shadow-inner outline-none appearance-none toggle checked:bg-primary-light disabled:bg-gray-200 focus:outline-none"
                      />
                      <span
                        class="absolute top-0 left-0 w-4 h-4 transition-all transform scale-150 bg-white rounded-full shadow-sm"
                      ></span>
                    </div>
                    <span class="ml-3 text-sm font-normal text-gray-500 dark:text-gray-400">
                      اوافق على
                      <a href="#" class="text-sm text-blue-600 hover:underline">سياسة الخصوصية والاستخدام</a>
                    </span>
                  </label>
                </div>
                <div>
                  <button
                    type="submit"
                    class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker"
                  >
                    انشاء حساب
                  </button>
                </div>
              </form>

              <!-- Or -->
              <div class="flex items-center justify-center space-x-2 flex-nowrap">
                <span class="w-20 h-px bg-gray-300"></span>
                <span>OR</span>
                <span class="w-20 h-px bg-gray-300"></span>
              </div>

              <!-- Social login links -->
              <!-- Brand icons src https://boxicons.com -->


              <!-- Login link -->
              <div class="text-sm text-gray-600 dark:text-gray-400">
                لديك حساب بالفعل ؟ <a href="{{route('login')}}" class="text-blue-600 hover:underline">تسجيل دخول </a>
              </div>
            </div>
          </main>
        </div>
        <!-- Toggle dark mode button -->
        <div class="fixed bottom-5 left-5">
          <button
            aria-hidden="true"
            @click="toggleTheme"
            class="p-2 transition-colors duration-200 rounded-full shadow-md bg-primary hover:bg-primary-darker focus:outline-none focus:ring focus:ring-primary"
          >
            <svg
              x-show="isDark"
              class="w-8 h-8 text-white"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
              />
            </svg>
            <svg
              x-show="!isDark"
              class="w-8 h-8 text-white"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
              />
            </svg>
          </button>
        </div>
      </div>
</x-guest-layout>
