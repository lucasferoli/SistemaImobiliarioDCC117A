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
        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalNovoImovel">Adicionar Novo Imóvel</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Endereço</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

            @foreach($properties as $property) 
            <tr>
                <td>{{$property->id}}</td>
                <td>{{$property->title}}</td>
                <td>{{$property->address}}</td>
                <td>{{$property->buyPrice}}</td>
                <td>
                    <a href="#" class="btn btn-primary btn-sm">Editar</a>
                    <a href="#" class="btn btn-danger btn-sm">Excluir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Novo Imóvel -->
<?php include resource_path('views/admin/modals/propriedades/criar.php'); ?>

<!-- Editar Imóvel -->
<?php include resource_path('views/admin/modals/propriedades/criar.php'); ?>

<!-- Excluir -->
<?php include resource_path('views/admin/modals/propriedades/criar.php'); ?>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
