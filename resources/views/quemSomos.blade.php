<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quem Somos | ImobiFácil</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    @include('modais.navbar')

    <header class="bg-white shadow-sm py-5 mb-4">
        <div class="container text-center">
            <!-- Logo Placeholder -->
            <div class="mb-3">
                <img src="{{ asset('assets/imobiFacil.png') }}" alt="ImobiFácil Logo" style="max-height: 90px;">
            </div>
            <h1 class="display-5 fw-bold text-primary">Quem Somos</h1>
        </div>
    </header>

    <main class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm mb-5">
                    <div class="card-body p-5">
                        <p class="fs-5 mb-4">
                            Somos uma plataforma digital pensada para transformar a forma como pessoas compram, vendem ou alugam imóveis. O <strong>ImobiFácil</strong> nasceu com o propósito de facilitar a intermediação imobiliária, oferecendo uma experiência mais simples, rápida e acessível para todos os envolvidos.
                        </p>
                        <p class="fs-5 mb-4">
                            Nosso sistema permite que qualquer usuário crie anúncios de imóveis com facilidade, além de disponibilizar uma ampla base de dados para quem está em busca de uma nova casa, apartamento ou espaço comercial. Através de ferramentas de filtragem eficientes e uma interface intuitiva, promovemos uma navegação prática que conecta oportunidades a necessidades reais.
                        </p>
                        <p class="fs-5 mb-4">
                            Queremos tornar o processo de encontrar ou anunciar um imóvel mais transparente, democrático e sem complicações. Seja você proprietário, corretor ou futuro morador, aqui você tem um espaço confiável para realizar seu objetivo com comodidade e segurança.
                        </p>
                        <hr>
                        <h4 class="text-primary text-center mt-4">ImobiFácil – porque seu imóvel ideal pode estar a um clique de distância.</h4>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-primary text-white text-center py-3">
        &copy; {{ date('Y') }} ImobiFácil. Todos os direitos reservados.
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
