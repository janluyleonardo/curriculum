<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- favicon -->
        <link rel="shortcut icon" href="{{asset('favicon.png?V='.now()->format('H.s'))}}" type="image/x-icon">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{asset('css/welcome.css')}}" rel="stylesheet">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">


            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8" >
                <div class="flex justify pt-8 sm:justify-start sm:pt-0">
                    <img src="{{asset('images/icono-curriculum.png')}}" alt="icono" width="250">
                </div>

                <div class="flex justify-center mt-2">
                    @if (Route::has('login'))
                        <div class="">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="tbtn btn-primary ">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary ">{{__('Log in')}}</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-primary ">{{__('Register')}}</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
