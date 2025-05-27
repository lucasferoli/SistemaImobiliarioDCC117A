<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo - Imóveis</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include resource_path('views/admin/modals/header.php'); ?>

<div class="container my-5">
    <h1 class="mb-4">Gerenciamento de Imóveis</h1>
    <div class="mb-3">
        <a href="#" class="btn btn-success">Adicionar Novo Imóvel</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Endereço</th>
                <th>Tipo</th>
                <th>Preço</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Apartamento Central</td>
                <td>Rua das Flores, 123</td>
                <td>Apartamento</td>
                <td>R$ 350.000</td>
                <td>Disponível</td>
                <td>
                    <a href="#" class="btn btn-primary btn-sm">Editar</a>
                    <a href="#" class="btn btn-danger btn-sm">Excluir</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Casa com Piscina</td>
                <td>Av. Brasil, 456</td>
                <td>Casa</td>
                <td>R$ 750.000</td>
                <td>Vendido</td>
                <td>
                    <a href="#" class="btn btn-primary btn-sm">Editar</a>
                    <a href="#" class="btn btn-danger btn-sm">Excluir</a>
                </td>
            </tr>
            <!-- Adicione mais imóveis conforme necessário -->
        </tbody>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
