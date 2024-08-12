<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide&amp;display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide&amp;display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <!-- Include Choices.js CSS -->
        <link rel="stylesheet" href="welcome_assets/css/choices.min.css" />
        <link rel="stylesheet" href="welcome_assets/fonts/font-awesome.min.css">    
        <link rel="stylesheet" href="welcome_assets/fonts/ionicons.min.css">
        <link rel="stylesheet" href="welcome_assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="welcome_assets/css/Highlight-Blue.css">
        <link rel="stylesheet" href="welcome_assets/css/Login-Form-Dark.css">
        <link rel="stylesheet" href="welcome_assets/css/bootstrap_modified.css">
        <link rel="stylesheet" href="welcome_assets/css/Article-List.css">

         <!-- Scripts -->          
        <!-- Include Choices.js JS -->
        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
        <script src="welcome_assets/js/agency.js"></script>
        <script src="welcome_assets/js/bootstrap.js"></script>
        <script src="welcome_assets/js/bootstrap.min.js"></script>
        <script src="welcome_assets/js/bs-init.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
        <!-- Sweet Alert.js JS -->       
        <link rel="preload" as="style" href="https://rad-docker.onrender.com/build/assets/app-DaN8u4V-.css">
        <link rel="modulepreload" href="https://rad-docker.onrender.com/build/assets/app-Cs0QkU1O.js">
        <link rel="stylesheet" href="https://rad-docker.onrender.com/build/assets/app-DaN8u4V-.css">
        <script type="module" src="https://rad-docker.onrender.com/build/assets/app-Cs0QkU1O.js"></script>
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js',]) --}}
        
    </head>
    <body class="font-poppins antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900"  style="max-width: 100%;min-width: 100%;min-height: 750px; padding-bottom: 100px; max-height: 100%;background: url(&quot;welcome_assets/img/giphy.gif&quot;) no-repeat, #ffffff;background-size: cover, auto;">
            @include('layouts.navigation')
            @include('components.response')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main style="margin-top: 50px;">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
