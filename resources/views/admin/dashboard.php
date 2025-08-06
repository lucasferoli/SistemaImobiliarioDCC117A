<?php

use App\Models\User;
use App\Models\Property;

$imoveisCount = Property::count();
$clientesCount = User::where('role', 'user')->count();
$adminsCount = User::where('role', 'admin')->count();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo - Imobiliária</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include resource_path('views/admin/modals/header.php'); ?>

<div class="container my-5">
    <h1 class="mb-4">Painel Administrativo</h1>
    <div class="row g-4">
        <div class="col-md-3">
            <div class="card text-bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Imóveis</h5>
                    <p class="card-text fs-3"><?= $imoveisCount ?></p>
                    <a href="/admin/imoveisCrud" class="btn btn-light btn-sm">Gerenciar</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-success">
                <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                    <p class="card-text fs-3"><?= $clientesCount ?></p>
                    <a href="/admin/usuariosCrud" class="btn btn-light btn-sm">Gerenciar</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Administradores</h5>
                    <p class="card-text fs-3"><?= $adminsCount ?></p>
                    <a href="/admin/usuariosCrud" class="btn btn-light btn-sm">Gerenciar</a>
                </div>
            </div>
        </div>
        <!-- Removido o card de Visitas Agendadas -->
    </div>

    <!-- ... resto do código ... -->
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
