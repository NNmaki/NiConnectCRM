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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">

        <!-- Outer container -->
        <div class="min-h-screen flex"> 
            
            <!-- osa ykkoonen vasen -->
            <div class="hidden lg:flex flex-col justify-between items-center w-[72%] 
                        bg-cover bg-center"  
                 style="background-image: url('{{ asset('images/background.jpg') }}');">

                <div class="flex flex-col items-center justify-center flex-1">
                    <img src="{{ asset('images/fp_picture.png') }}" 
                        alt="CRM-järjestelmän kuva" 
                        class="w-auto max-h-48 object-cover rounded-xl transition duration-300 transform hover:scale-[1.01]"/>

                    <div class="mt-4 text-white text-5xl font-extrabold p-8 backdrop-blur-sm rounded-lg">   
                        NiConnect – Simple CRM for Smarter Connections
                    </div>
                </div>

                <div class="mt-4 text-white text-lg p-8 backdrop-blur-sm rounded-lg">   
                    © 2025 Niko Nnmaki All rights reserved
                </div>
            </div>

            <!-- osa kakkonen oikea -->
            <div class="flex flex-col justify-center items-center w-full lg:w-[28%] p-6 bg-white dark:bg-gray-900">
                
                <div class="mt-4 mb-8">
                    <a href="/">
                        <x-application-logo class="h-10 w-auto fill-current text-gray-500" />
                    </a>
                </div>

                <div class="w-full max-w-sm"> 
                    {{ $slot }}
                </div>
            </div>
            
        </div>
    </body>
</html>
