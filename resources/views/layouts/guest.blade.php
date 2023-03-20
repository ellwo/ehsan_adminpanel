<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link rel="icon" href="{{asset('log.svg')}}">

    <!-- Fonts -->

    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">





    <!-- end modules/novblockwishlist/novblockwishlist_top.tpl -->





    @livewireStyles
    <!-- Scripts -->
</head>

<body  class="antialiased" >




    <div   x-data="setup()" @resize.window="handleWindowResize" x-init="$refs.loading.classList.add('hidden');
    setColors('mycolor'); isSidebarOpen=false" :class="{ 'dark': isDark}">






    <div   class="min-h-screen text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
            <!-- Loading screen -->

        <x-loading/>


                        <!-- Sidebar -->


            <div  class="flex flex-col flex-1 min-h-full "
            style="transition-property: margin; transition-duration: 150ms;"
            >


            {{-- <x-navbar/> --}}

                <main  class="flex-1 px-4 sm:px-6">



                    {{$slot}}


                </main>



            </div>
        </div>
    </div>


    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireScripts

    @isset($script)
        {{$script}}
    @endisset

</body>

</html>
