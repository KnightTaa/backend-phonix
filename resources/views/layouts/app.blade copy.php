<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'PAD Awords') }}</title>

        <link
        rel="icon"
        href="{{asset('assets/img/kaiadmin/favicon.ico')}}"
        type="image/x-icon"
        />

        <!-- Fonts and icons -->
        <script src="{{asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>
        <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
            families: [
                "Font Awesome 5 Solid",
                "Font Awesome 5 Regular",
                "Font Awesome 5 Brands",
                "simple-line-icons",
            ],
            urls: ["{{asset('assets/css/fonts.min.css')}}"],
            },
            active: function () {
            sessionStorage.fonts = true;
            },
        });
        </script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

         <!-- CSS Files -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/plugins.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/kaiadmin.min.css')}}" />

        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
