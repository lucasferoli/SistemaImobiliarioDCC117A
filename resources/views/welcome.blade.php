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
                                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                    <li>
                                        <a class="dropdown-item">Ver seu Perfil</a>
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
            <!-- Exemplo de imóvel -->
            <div class="col">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Casa moderna">
                    <div class="card-body">
                        <h5 class="card-title">Casa Moderna</h5>
                        <p class="card-text">3 quartos • 2 banheiros • 120m²<br>R$ 450.000</p>
                        <a href="#" class="btn btn-primary">Ver detalhes</a>
                    </div>
                </div>
            </div>
            <!-- Exemplo de imóvel -->
            <div class="col">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1460518451285-97b6aa326961?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Apartamento">
                    <div class="card-body">
                        <h5 class="card-title">Apartamento no Centro</h5>
                        <p class="card-text">2 quartos • 1 banheiro • 80m²<br>R$ 1.500/mês</p>
                        <a href="#" class="btn btn-primary">Ver detalhes</a>
                    </div>
                </div>
            </div>
            <!-- Exemplo de imóvel -->
            <div class="col">
                <div class="card h-100">
                    <img src="https://images.unsplash.com/photo-1507089947368-19c1da9775ae?auto=format&fit=crop&w=400&q=80" class="card-img-top" alt="Sala comercial">
                    <div class="card-body">
                        <h5 class="card-title">Sala Comercial</h5>
                        <p class="card-text">50m² • Centro Empresarial<br>R$ 2.000/mês</p>
                        <a href="#" class="btn btn-primary">Ver detalhes</a>
                    </div>
                </div>
            </div>
            <!-- Adicione mais imóveis conforme necessário -->
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
