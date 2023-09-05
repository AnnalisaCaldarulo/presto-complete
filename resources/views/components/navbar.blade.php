<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top mb-5" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="./logo.png" alt="" class="img-fluid logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>

                <li class="nav-item">
                    <x-_locale lang='en' nation='en' />
                </li>
                <li class="nav-item">
                    <x-_locale lang='it' nation='it' />
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page"
                        href="{{ route('article.index') }}">{{ __('ui.index') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Categorie:
                    </a>
                    <ul class="dropdown-menu">

                        @foreach ($categories as $category)
                            @if (!$loop->first)
                                <li class="d-flex justify-content-center">
                                    <a href="{{ route('categoryShow', compact('category')) }}">
                                        @if (App::isLocale('en'))
                                            {{ $category->en }}
                                        @elseif(App::isLocale('it'))
                                            {{ $category->it }}
                                        @endif
                                    </a>
                                </li>
                                @if (!$loop->last)
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                @endif
                            @endif
                        @endforeach


                    </ul>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('article.create') }}">Crea
                            articolo</a>
                    </li>

                    @if (Auth::user() && Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('revisor.index') }}">Zona
                                revisore</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('work') }}">Lavora con noi</a>
                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Ciao, {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('cart') }}"><i class="bi bi-cart"></i></a></li>
                            <li>
                                {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout<i
                                        class="bi bi-door-closed-fill"></i></a>
                                <form method="POST" action="{{ route('logout') }}" style="display: none" id="form-logout">
                                    @csrf
                                </form> --}}
                                <form method="POST" action="{{ route('logout') }}" style="display: none" id="form-logout">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Logout</button>
                                </form>
                            </li>


                        </ul>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Ciao! </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('register') }}">Register</i></a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        </ul>
                    </li>
                @endauth

            </ul>
            <x-searchbar />
        </div>
    </div>
</nav>
