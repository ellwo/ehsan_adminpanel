<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('mysetting.site_name', 'K UI') }}</title>

    <link rel="icon" href="{{ config('mysetting.site_header_logo')}}">

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

        <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/translations/ar.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/ui/trumbowyg.min.css">
    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none;
        }

    </style>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles


@livewireScripts
  <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body  class="font-sans antialiased">
<div x-data="mainState" :class="{ dark: isDarkMode }" @resize.window="handleWindowResize" x-cloak>
    <div class="min-h-screen text-gray-900 bg-gray-100 dark:bg-dark-bg dark:text-gray-200">
        <!-- Sidebar -->
        <x-adminsidebar.sidebar.sidebar />
        <!-- Page Wrapper -->
        <div class="flex  flex-col min-h-screen"
             :class="{
                    'lg:ml-64': isSidebarOpen,
                    'md:ml-16': !isSidebarOpen
                }"
             style="transition-property: margin; transition-duration: 150ms;"
        >


            <!-- Navbar -->
            <x-navbar />

            <!-- Page Heading -->
            <header>
                <div class="p-4 sm:p-6">

                </div>
            </header>

            <!-- Page Content -->
            <main class="px-4 sm:px-6 flex-1">
                {{ $slot }}
            </main>

            <!-- Page Footer -->
            <x-footer class="mt-16" />
        </div>
    </div>


</div>




<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/uploadeimage.js')}}"></script>

@isset($script)

{{$script}}
@endisset

</body>

</html>
