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

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide&amp;display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="{{asset('fonts/font-awesome.min.css')}}">    
        <link rel="stylesheet" href="{{asset('fonts/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/Highlight-Blue.css')}}">
        <link rel="stylesheet" href="{{asset('css/Login-Form-Dark.css')}}">
        <link rel="stylesheet" href="{{asset('css/untitled.css')}}">
        <link rel="stylesheet" href="{{asset('css/Article-List.css')}}">

        <script src="{{asset('js/agency.js')}}"></script>
        <script src="{{asset('js/bootstrap.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/bs-init.js')}}"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        @include('layouts.navigation')

            {{-- <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"> --}}
                {{ $slot }}
            {{-- </div> --}}
        
    </body>
</html>
