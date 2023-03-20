<x-guest-layout>
    {{-- <x-auth-card class="">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" class="" action="{{ route('login') }}">
            @csrf
            <div class="grid gap-6 ">
                <!-- Email Address -->

                <div class="space-y-2 ">
                    <x-label for="email" :value="__('Email')" />

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">

                            <x-heroicon-o-mail aria-hidden="true" class="w-5 h-5" />



                        </x-slot>
                        <x-input withicon id="email" class="block focus:ring-primary_color focus:border-primary_color w-full" type="email" name="email"
                            :value="old('email')" placeholder="{{ __('Email') }}" required autofocus />
                    </x-input-with-icon-wrapper>
                </div>

                <!-- Password -->
                <div class="space-y-2 ">
                    <x-label for="password" :value="__('Password')" />

                    <x-input-with-icon-wrapper>
                        <x-slot name="icon">
                            <x-heroicon-o-lock-closed aria-hidden="true" class="w-5 h-5" />
                        </x-slot>
                        <x-input withicon id="password" class="block focus:ring-primary_color focus:border-primary_color w-full" type="password" name="password" required
                            autocomplete="current-password" placeholder="{{ __('Password') }}" />
                    </x-input-with-icon-wrapper>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="text-base-300 border-gray-300 rounded focus:border-base-100 focus:ring focus:ring-primary_color dark:border-primary_color dark:bg-dark-eval-1 dark:focus:ring-offset-dark-eval-1"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                    <a class="text-sm text-blue-500 hover:underline" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif
                </div>

                <div>
                    <x-button  class="justify-center  w-full gap-2">
                        <x-heroicon-o-login class="w-6 h-6" aria-hidden="true" />
                        <span>{{ __('Log in') }}</span>
                    </x-button>
                </div>

                @if (Route::has('register'))
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Don’t have an account?') }}
                    <a href="{{ route('register') }}" class="text-blue-500 hover:underline">
                        {{ __('Register') }}
                    </a>
                </p>
                @endif
            </div>
        </form>
    </x-auth-card>
    884820155
 --}}

 <div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors('mycolor');" :class="{ 'dark': isDark}">
    <!-- Loading screen -->
    <x-loading />

    <div
      class="flex flex-col items-center justify-center min-h-screen p-4 space-y-4 antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light"
    >
      <!-- Brand -->
     <x-application-logo class="h-24 w-24" />
      <main>
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="w-full max-w-sm px-4 py-6 space-y-6 bg-white rounded-md dark:bg-darker">
          <h1 class="text-xl font-semibold text-center">تسجيل الدخول</h1>
          <x-auth-validation-errors class="mb-4" :errors="$errors" />
          @if(session('error_login'))

          <h3 class="text-lg text-danger ">{{ session('error_login') }}</h3>
          @endif

          <form action="{{route('login')}}" method="POST" class="space-y-6">
            @csrf
            <div class="space-y-2 text-danger">
                <x-label for="user" class="mx-auto text-center" :value="__(' البريد الالكتروني /اسم المستخدم')" />
                <x-input-with-icon-wrapper >
                    <x-slot name="icon">
                        <x-heroicon-o-user aria-hidden="true" class="w-5 h-5" />
                    </x-slot>
                    <x-input  withicon id="user" class="block
                   w-full" type="text" name="user"
                        :value="old('user')" required placeholder="{{ __('Email/Username') }}" />
                </x-input-with-icon-wrapper>

                @error("user")

                <hr class="text-danger bg-danger border-2 border-danger"/>
                <span class="text-danger text-xs ">{{$message}}</span>
                @enderror
                @error("username")

                <hr class="text-danger bg-danger border-2 border-danger"/>
                <span class="text-danger text-xs ">{{$message}}</span>
                @enderror
            </div>

            <div class="space-y-2" x-data='{isshow:false}' >
                <x-label for="password" class="mx-auto text-center" :value="__('كلمة المرور')" />
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

                <hr class="text-danger bg-danger border-2 border-danger"/>
                <span class="text-danger text-xs ">{{$message}}</span>
                @enderror

            </div>
            <div class="flex items-center justify-between">
              <!-- Remember me toggle -->
              <label class="flex items-center">
                <div class="relative inline-flex items-center">
                  <input
                    type="checkbox"
                    name="remembr_me"
                    class="w-10 h-4 transition bg-gray-200 border-none rounded-full shadow-inner outline-none appearance-none toggle checked:bg-primary-light disabled:bg-gray-200 focus:outline-none"
                  />
                  <span
                    class="absolute top-0 left-0 w-4 h-4 transition-all transform scale-150 bg-white rounded-full shadow-sm"
                  ></span>
                </div>
                <span class="ml-3 text-sm font-normal text-gray-500 dark:text-gray-400">تذكرني</span>
              </label>

              <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">نسيت كلمة المرور؟</a>
            </div>
            <div>
              <button
                type="submit"
                class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker"
              >
                دخول
              </button>
            </div>
          </form>

          <!-- Or -->


          <!-- Social login links -->
          <!-- Brand icons src https://boxicons.com -->
          <div class="flex flex-1 items-center text-center">



          </div>


          <!-- Register link -->

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



    <x-slot name="script">

        <script>
//  var svg= document.querySelector("body > div:nth-child(1) > div > div.flex.flex-col.flex-1.min-h-full > main > div > div.w-24.h-24.mx-auto.text-center.sm\\:w-32.sm\\:h-32 > svg");
   //document.html=
  // svg.innerHTML="<div>hi</div>";

                    // var h=100;
                    // var w=150;
                    // var max_size=150;
                    // var canvas = document.createElement('canvas');
                    // canvas.width = w;
                    // canvas.height = h;
                    // var chim = max_size - h;
                    // var chwi = max_size - w;
                    // var ctx = canvas.getContext('2d');
                    // ctx.drawImage(svg, 0, 0, w, h);
                    // ctx.fillStyle = color;
                    // canvas.id = 'red';
                    // var convasimg = document.createElement('canvas');
                    // convasimg.width = max_size + 5;
                    // convasimg.height = max_size + 5;
                    // // convasimg.id = 'con' + divid;
                    // var ctximg = convasimg.getContext('2d');
                    // ctximg.fillStyle = color;
                    // ctximg.fillRect(0, 0, max_size + 5, max_size + 5);
                    // ctximg.putImageData(ctx.getImageData(0, 0, max_size, max_size), chwi / 2, chim / 2, 0, 0, w, h);

                    // svg.innerHTML=ctximg;



// var svgElement =document.querySelector("body > div:nth-child(1) > div > div.flex.flex-col.flex-1.min-h-full > main > div > div.h-24.w-24 > svg");
// // document.getElementById('svg_element');
// let {width, height} = svgElement.getBBox();
// let clonedSvgElement = svgElement.cloneNode(true);
// let outerHTML = clonedSvgElement.outerHTML,
//   blob = new Blob([outerHTML],{type:'image/svg+xml;charset=utf-8'});
//   let URL = window.URL || window.webkitURL || window;
// let blobURL = URL.createObjectURL(blob);
// let image = new Image();

// image.onload = () => {

//     let canvas = document.createElement('canvas');

//    canvas.widht = width;

//    canvas.height = height;
//    let context = canvas.getContext('2d');
//    // draw image in canvas starting left-0 , top - 0
//    context.drawImage(image, 0, 0, width, height );
// var download = function(href, name){
//   var link = document.createElement('a');
//   link.download = name;
//   link.style.opacity = "0";
//  // document.append(link);
//   link.href = href;
//   link.click();
//   link.remove();
// }
// let png = canvas.toDataURL(); // default png
// let jpeg = canvas.toDataURL('image/jpg');
// let webp = canvas.toDataURL('image/webp');
// let gif = canvas.toDataURL('image/gif');

// download(png, "image10.png");
// download(jpeg, "image20.jpeg");
// download(webp, "image22.webp");
// download(gif, "image33.gif");

// //   downloadImage(canvas);
//    //need to implement
// };
// image.src = blobURL;


// //svgElement.innerHTML=canvas;



console.log("from script");
//  alret("eee");
        </script>

    </x-slot>


</x-guest-layout>
