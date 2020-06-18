<nav class="navbar-expand-md">
    <div class="container">
        <div class="navigation">
            <div class="navLogo">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div><img src="/images/logo.png"></div>
                </a>
            </div>
            <div class="navName">SunShine Estates</div>
            <div class="navLogin">
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                            @else
                                <div class="dropdown nav-link">
                                    <div class="dropdown-toggle">{{ Auth::user()->username }}</div>
                                    <div class="dropdown-content">
                                        <a href="/profile/{{ Auth::user()->id }}">My Profile</a>
                                        <div class="nav-item">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                        </div>
                                    </div>
                                </div>
                        @endguest
                    </ul>
                </div>
            </div>
            <div class="navLinks">
                <ul class="navUl">
                    <li>
                        <a href="https://en-gb.facebook.com/" class="">For Sale</a>
                    </li>
                    <li>
                        <a href="https://twitter.com/explore" class="">To Rent</a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/" class="">New Homes</a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/" class="">Commercial</a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/" class="">Overseas</a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/" class="">Find Agents</a>
                    </li>
                    <li>
                        <a href="https://edu.google.com/products/classroom/?modal_active=none" class="">House prices</a>
                    </li>
                </ul>
            </div>
            <div>
            </div>
        </div>
    </div>
</nav>
