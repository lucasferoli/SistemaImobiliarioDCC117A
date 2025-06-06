<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bem-vindo à Imobiliária</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Imobiliária DCC117A</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
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

    <header class="bg-white py-5 shadow-sm mb-4">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Bem-vindo à sua nova casa!</h1>
            <p class="lead">Encontre os melhores imóveis para alugar ou comprar. Casas, apartamentos, salas comerciais e muito mais!</p>
        </div>
    </header>

    <main class="container mb-5">
        <h2 class="mb-4 text-primary">Destaques</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($properties as $property)
            <div class="col">
                <div class="card h-100">
                    @if(isset($property->image) && filter_var($property->image, FILTER_VALIDATE_URL))
                        <img src="{{ $property->image }}" class="card-img-top" alt="Imagem do Imóvel">
                    @else
                        <img src="{{ $property->imagem_url ?? 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80' }}" class="card-img-top" alt="{{ $property->titulo ?? 'Imóvel' }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $property->title }}</h5>
                        <p class="card-text mb-1"><strong>Endereço:</strong> {{ $property->address }}</p>
                        <p class="card-text mb-1"><strong>Preço de Compra:</strong> R$ {{ number_format($property->buyPrice, 2, ',', '.') }}</p>
                        <p class="card-text mb-3"><strong>Preço de Aluguel:</strong> R$ {{ number_format($property->rentPrice, 2, ',', '.') }}</p>
                        <a href="{{ route('properties.show', $property->id) }}" class="btn btn-primary">Ver detalhes</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="text-center mt-5">
            <a href="#" class="btn btn-outline-primary btn-lg">Ver todos os imóveis</a>
        </div>
    </main>

    <footer class="bg-primary text-white text-center py-3">
        &copy; {{ date('Y') }} Imobiliária DCC117A. Todos os direitos reservados.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
