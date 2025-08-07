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

    @include('modais.navbar')

    <header class="bg-white py-5 shadow-sm mb-4">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">Bem-vindo à sua nova casa!</h1>
            <p class="lead">
                Encontre os melhores imóveis para alugar ou comprar. Casas, apartamentos, salas comerciais e muito mais!
            </p>
        </div>
    </header>

    <main class="container mb-5">
        <h2 class="mb-4 text-primary">Destaques</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($properties as $property)
                @if($property->status !== 'sold' && $property->status !== 'rented' && Auth::id() !== $property->user_id)

                <div class="col">
                    <div class="card h-100 d-flex flex-column">
                        <div class="d-flex justify-content-center align-items-center pt-3" style="height: 200px; overflow: hidden;">
                            <img src="{{ $property->image }}" class="card-img-top" alt="Imagem do Imóvel" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">{{ $property->title }}</h5>
                            <p class="card-text mb-1"><strong>Endereço:</strong> {{ $property->address }}</p>
                            <p class="card-text mb-1"><strong>Preço de Compra:</strong> R$ {{ number_format($property->buyPrice, 2, ',', '.') }}</p>
                            <p class="card-text mb-3"><strong>Preço de Aluguel:</strong> R$ {{ number_format($property->rentPrice, 2, ',', '.') }}</p>
                            <a href="{{ route('properties.show', $property->id) }}" class="btn btn-primary mt-auto">Ver detalhes</a>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </main>

    <footer class="bg-primary text-white text-center py-3">
        &copy; {{ date('Y') }} Imobiliária DCC117A. Todos os direitos reservados.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<!--
Guia de Instalação do Sistema Imobiliário DCC117A

Repositório GitHub: https://github.com/lucasferoli/SistemaImobiliarioDCC117A.git

Pré-requisitos:
- XAMPP instalado e em execução (Apache e MySQL)
- Composer instalado
- PHP 8.1 ou superior

Passos de Instalação:

1. Abra o terminal e clone o projeto na pasta de sua escolha:
    cd C:\caminho\da\pasta

2. Instale as dependências:
    composer install

3. Copie o arquivo .env.example e renomeie para .env

4. Configure o banco de dados no arquivo .env:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=sistema_imobiliario
    DB_USERNAME=root
    DB_PASSWORD=

5. Crie o banco de dados no MySQL:
    CREATE DATABASE sistema_imobiliario;

6. Gere a chave da aplicação:
    php artisan key:generate

7. Rode as migrations:
    php artisan migrate

8. (Opcional) Popule o banco de dados com seeders:
    php artisan db:seed

9. Inicie o servidor:
    php artisan serve

10. Acesse no navegador:
     http://127.0.0.1:8000

Observação:
Todos os usuários e administradores têm a senha padrão “password”. Utilize um deles para acessar as áreas protegidas do site.
-->
