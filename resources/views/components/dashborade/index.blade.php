
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>{{ config('app.name') }}</title>
 <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset('log.svg')}}">

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet" />
        <link
	href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
	rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- <link rel="stylesheet" href="build/css/tailwind.css" /> --}}

    @livewireStyles

    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="antialiased" >














    <div x-data="setup()" @resize.window="handleWindowResize" x-init="$refs.loading.classList.add('hidden');
    setColors('mycolor'); isSidebarOpen=false" :class="{ 'dark': isDark}">


    <div   class="min-h-screen text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
            <!-- Loading screen -->

            @auth

            @if(!isset($withsidebar))
            <x-sidebar.sidebar/>
            @endif
            @endauth

            <x-loading/>


                        <!-- Sidebar -->


            <div :class="{
                'lg:ml-64': isSidebarOpen,
                'md:ml-16': !isSidebarOpen
            }" class="flex flex-col flex-1 min-h-full "
            style="transition-property: margin; transition-duration: 150ms;"
            >

                <!-- her Is The Nav Bar -->
                @auth

                <x-dashborade.navbar/>

                @endauth

                <main class="flex-1 px-4 sm:px-6">

                    {{$slot}}

                </main>



            </div>
        </div>
        <!-- here is The Bob Up Views Or Panle -->

    </div>






    <!-- her is The Scripts -->

    @livewireScripts

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    @isset($script)
        {{$script}}

    @endisset


</body>
</html>
