<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Weddit | Home of the internet</title>

        <link rel="shortcut icon" href="images/favicon.ico"/>

        <link rel="stylesheet" href="{{url('css/mystyles.css')}}">
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css"> --}}

        <style>
            body {
                font-family: 'Verdana';
            }

            .box{
                border:1px solid #383838;
            }

            .image{
                border:1px solid #383838;
            }

            .navbar{
                border-bottom:1px solid #383838
            }
        </style>

        @yield('head')

    </head>
    
    <body class ="has-background-black-bis">
    <nav class="navbar has-background-black-ter mb-6" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
            <img src="{{url('images/navlogo.png')}}" width="150" height="300">
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-end">
                    <div class="navbar-item">
                        @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                @auth
                                <div class="navbar-item has-dropdown is-hoverable">
                                    <a class="navbar-link has-text-white-ter">
                                    Hi, {{ Auth::user()->username }}
                                    </a>

                                    <div class="navbar-dropdown">
                                    <a class="navbar-item has-text-white-ter" href="">
                                        New Post
                                    </a>
                                    <a class="navbar-item has-text-white-ter" href="{{url('w/create')}}">
                                        New Subweddit
                                    </a>
                                    <hr class="navbar-divider">
                                        <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a class="navbar-item has-text-white-ter" href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                        this.closest('form').submit();">
                                                                {{ __('Logout') }}
                                        </a>
                                        </form>
                                    </div>
                                </div>
                                @else
                                    <a href="{{ route('login') }}" class="button is-primary">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="button is-light"><strong>Sign up</strong></a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>  

            @yield ('content')

        {{-- <script src="https://unpkg.com/turbolinks"></script> --}}
    </body>
</html>

