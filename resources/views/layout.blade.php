<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html{line-height:1.15;-webkit-text-size-adjust:100%}>        
        </style>

        <link rel="stylesheet" href="css/mystyles.css">

        <style>
            body {
                font-family: 'Nunito';
            }

            .navbar{
                padding:0;
            }
        </style>

        @yield('head')

    </head>
    
    <body>
    <nav class="navbar is-dark" role="navigation" aria-label="main navigation">

            <div class="navbar-brand">
                <a class="navbar-item" href="https://bulma.io">
                <img src="images/navlogo.png" width="150" height="500">
                </a>

                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-end">
                <div class="navbar-item">
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="buttons is-warning">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="button is-warning">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="button is-light"><strong>Sign up</strong></a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
                </div>
            </div>
        </nav>
    @yield ('content')
    </body>
</html>

