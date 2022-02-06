<body>
    <div id="app">
        <nav style="background-color:#bc986a;" class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <div class="logo">
                    <img src="{{ asset('images/dog&go.png') }}" onclick="window.location='/home'">
                </div>
                <div>
                <form method="GET" action="{{ route('index') }}" id="buscador" class="search-bar">
                        <input type="search" id="search" pattern=".*\S.*" required>
                        <button class="search-btn" type="submit">
                            <span>Search</span>
                        </button>
                    </form>
                </div>

                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li>
                             @include('includes.avatar') 
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('home') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('index') }}">
                                    Friends
                                </a>
                                <a class="dropdown-item" href="{{ route('profileus') }}">
                                    Profile
                                </a>
                                <a class="dropdown-item" href="{{ route('profile', ['id' => Auth::user()->id]) }}">
                                   Gallery 
                                </a>
                                <a class="dropdown-item" href="{{ route('image.create') }}">
                                        Upload 
                                </a>
                                <a class="dropdown-item" href="{{ route('likes') }}">
                                    Favorites
                                </a>
                                <a class="dropdown-item" href="{{ route('config') }}">
                                    Configuration
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <main class="py-4">
        @yield('content')
    </main>
</body>
<style>
    .dropdown-menu {
        background-color: #bc986a;
        /* background-color: #F2D8B8; */
        /* background-color: #F6F1D1; */
    }
    .navbar {
        padding: 0px;
    }
    body {
        background: #fafafa;
    }
    .logo img {
        width: 125px;
        padding: 1px;
    }
    * {
        border: 0;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    :root {
        font-size: calc(16px + (24 - 16)*(100vw - 320px)/(1920 - 320));
    }
    body,
    button,
    input {
        font: 1em Hind, sans-serif;
        line-height: 1.5em;
    }
    body,
    input {
        color: #171717;
    }
    .search-bar {
        display: flex;
    }
    body {
        background: #fff4e6;
        height: 100vh;
    }
    .search-bar input,
    .search-btn,
    .search-btn:before,
    .search-btn:after {
        transition: all 0.25s ease-out;
    }
    .search-bar input,
    .search-btn {
        width: 3em;
        height: 3em;
    }
    .search-bar input:invalid:not(:focus),
    .search-btn {
        cursor: pointer;
    }
    .search-bar,
    .search-bar input:focus,
    .search-bar input:valid {
        width: 100%;
    }
    .search-bar input:focus,
    .search-bar input:not(:focus)+.search-btn:focus {
        outline: transparent;
    }
    .search-bar {
        margin: auto;
        padding: 1.5em;
        justify-content: center;
        max-width: 30em;
    }
    .search-bar input {
        background: transparent;
        border-radius: 1.5em;
        box-shadow: 0 0 0 0.4em #171717 inset;
        padding: 0.75em;
        transform: translate(0.5em, 0.5em) scale(0.5);
        transform-origin: 100% 0;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }
    .search-bar input::-webkit-search-decoration {
        -webkit-appearance: none;
    }
    .search-bar input:focus,
    .search-bar input:valid {
        background: #fff;
        border-radius: 0.375em 0 0 0.375em;
        box-shadow: 0 0 0 0.1em #d9d9d9 inset;
        transform: scale(1);
    }
    .search-btn {
        background: #171717;
        border-radius: 0 0.75em 0.75em 0 / 0 1.5em 1.5em 0;
        padding: 0.75em;
        position: relative;
        transform: translate(0.25em, 0.25em) rotate(45deg) scale(0.25, 0.125);
        transform-origin: 0 50%;
    }
    .search-btn:before,
    .search-btn:after {
        content: "";
        display: block;
        opacity: 0;
        position: absolute;
    }
    .search-btn:before {
        border-radius: 50%;
        box-shadow: 0 0 0 0.2em #f1f1f1 inset;
        top: 0.75em;
        left: 0.75em;
        width: 1.2em;
        height: 1.2em;
    }
    .search-btn:after {
        background: #f1f1f1;
        border-radius: 0 0.25em 0.25em 0;
        top: 51%;
        left: 51%;
        width: 0.75em;
        height: 0.25em;
        transform: translate(0.2em, 0) rotate(45deg);
        transform-origin: 0 50%;
    }
    .search-btn span {
        display: inline-block;
        overflow: hidden;
        width: 1px;
        height: 1px;
    }
    /* Active state */
    .search-bar input:focus+.search-btn,
    .search-bar input:valid+.search-btn {
        background: #282422;
        border-radius: 0 0.375em 0.375em 0;
        transform: scale(1);
    }
    .search-bar input:focus+.search-btn:before,
    .search-bar input:focus+.search-btn:after,
    .search-bar input:valid+.search-btn:before,
    .search-bar input:valid+.search-btn:after {
        opacity: 1;
    }
    .search-bar input:focus+.search-btn:hover,
    .search-bar input:valid+.search-btn:hover,
    .search-bar input:valid:not(:focus)+.search-btn:focus {
        background: #282422;
    }
    .search-bar input:focus+.search-btn:active,
    .search-bar input:valid+.search-btn:active {
        transform: translateY(1px);
    }
    @media screen and (prefers-color-scheme: dark) {
        body,
        input {
            color: #f1f1f1;
        }
        body {
            background: #171717;
        }
        .search-bar input {
            box-shadow: 0 0 0 0.4em #f1f1f1 inset;
        }
        .search-bar input:focus,
        .search-bar input:valid {
            background: #3d3d3d;
            box-shadow: 0 0 0 0.1em #3d3d3d inset;
        }
        .search-btn {
            background: #f1f1f1;
        }
    }
    /* start header */
    .navigation-search-container {
        position: relative;
    }
    .navigation-search-container input {
        background-color: #fafafa;
        padding: 3px 20px;
        padding-left: 25px;
        height: 30px;
        box-sizing: border-box;
        border: 1px solid rgba(0, 0, 0, 0.0975);
        border-radius: 3px;
        font-size: 14px;
    }
    .navigation-search-container .fa-search {
        position: absolute;
        top: 10px;
        left: 10px;
        font-size: 11px;
        color: rgba(0, 0, 0, 0.5);
    }
    @media only screen and (min-width: 320px) and (max-width: 650px) {
        /* Navigation */
        .navigation {
            padding: 0 20px;
            justify-content: space-between;
        }
        .navigation-search-container {
            display: none;
        }
    }
    .navigation-search-container input:focus {
        outline: none;
    }
    .navigation-search-container input::placeholder {
        text-align: center;
    }
    .navigation-icons a {
        text-decoration: none;
    }
    .navigation-link i {
        margin-left: 30px;
        color: black;
        font-size: 22px;
    }
    .notification-bubble-wrapper {
        position: relative;
        top: -30px;
        left: 17px;
    }
    .notification-bubble {
        position: absolute;
        min-width: 20px;
        min-height: 20px;
        border-radius: 50%;
        background: #ff2c74;
        color: #fff;
        text-align: center;
        font-size: 13px;
        padding: 5px 5px 3px;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
            Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
        font-weight: 500;
        display: none;
    }
</style>