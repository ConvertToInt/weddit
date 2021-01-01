<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Weddit | Home</title>

        <link rel="stylesheet" href="../css/mystyles.css">

        <style>
            body {
                font-family: 'Nunito';
                background-color: #141414;
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
                <a class="navbar-item" href="home">
                <img src="../images/navlogo.png" width="150" height="300">
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-end">
                <div class="navbar-item">
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link">
                                Hi, {{ Auth::user()->name }}
                                </a>

                                <div class="navbar-dropdown">
                                <a class="navbar-item">
                                    Profile
                                </a>
                                <a class="navbar-item" href="/posts/create">
                                    New Post
                                </a>
                                <a class="navbar-item" href="/subweddits/create">
                                    New Subweddit
                                </a>
                                <hr class="navbar-divider">
                                <a class="navbar-item"> 
                                    <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                                         onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                            {{ __('Logout') }}
                                    </x-jet-dropdown-link>
                                    </form>
                                </a>
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
    </body>
</html>

