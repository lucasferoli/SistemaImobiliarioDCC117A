<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('modais.navbar')
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/120" class="rounded-circle mb-3" alt="Foto do Usuário">
                        <h3 class="card-title mb-1">Nome do Usuário</h3>
                        <p class="text-muted mb-3">usuario@email.com</p>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-6 text-end fw-bold">Telefone:</div>
                            <div class="col-6 text-start"> (00) 00000-0000 </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 text-end fw-bold">Endereço:</div>
                            <div class="col-6 text-start"> Rua Exemplo, 123 </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 text-end fw-bold">Cidade:</div>
                            <div class="col-6 text-start"> Cidade Exemplo </div>
                        </div>
                        <a href="#" class="btn btn-primary mt-3">Editar Perfil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>