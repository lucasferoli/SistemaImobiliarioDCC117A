    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <!-- LOGO -->
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('assets/imobiFacil.png') }}" alt="Logo" style="height:56px;vertical-align:middle;">
                <span class="ms-2" style="font-size:1rem; font-weight:500; vertical-align:middle;">IMOBIFACIL</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Left side links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/imobifacil') }}">Quem Somos Nós</a>
                    </li>
                </ul>    <!-- Profile / Auth links -->
                <ul class="navbar-nav mb-2 mb-lg-0">
                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->role == 'admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/admin/dashboard') }}">Dashboard</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/profile') }}">Ver seu Perfil</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Entrar</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>