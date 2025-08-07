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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    @if(auth()->user()->role === 'user')
        @include('modais.navbar')
    @else
        <?php include resource_path('views/admin/modals/header.php'); ?>
    @endif
    <div class="container my-5">
            @if(auth()->user()->role !== 'user')
            <h1 class="mb-4">Painel Administrativo</h1>
            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="card text-bg-primary h-100">
                        <div class="card-body">
                            <h5 class="card-title">Imóveis</h5>
                            <p class="card-text fs-3"><?= $imoveisCount ?></p>
                            <a href="/admin/imoveisCrud" class="btn btn-light btn-sm">Gerenciar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-bg-success h-100">
                        <div class="card-body">
                            <h5 class="card-title">Clientes</h5>
                            <p class="card-text fs-3"><?= $clientesCount ?></p>
                            <a href="/admin/usuariosCrud" class="btn btn-light btn-sm">Gerenciar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-bg-warning h-100">
                        <div class="card-body">
                            <h5 class="card-title">Administradores</h5>
                            <p class="card-text fs-3"><?= $adminsCount ?></p>
                            <a href="/admin/usuariosCrud" class="btn btn-light btn-sm">Gerenciar</a>
                        </div>
                    </div>
                </div>
            </div>
    @endif

        <div class="card mb-5">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Meus Imóveis</h4>
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                    data-bs-target="#modalNovoImovel">
                    <i class="bi bi-plus-circle"></i> Anunciar Novo Imóvel
                </button>
            </div>

            @include('admin.modals.propriedades.criar')

            <div class="row g-4 px-4 py-3">
                @foreach($properties->where('user_id', auth()->id()) as $property)
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="/{{ $property->image }}" class="card-img-top" alt="{{ $property->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $property->title }}</h5>
                            <p class="card-text">
                                <br>Localização: {{ $property->address }}
                            </p>
                            <span class="badge bg-success">À Venda</span>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                Anunciado em: {{ $property->created_at->format('d/m/Y') }}
                            </small>
                            <div>
                                <button type="button" class="btn btn-sm btn-outline-primary me-1" title="Editar"
                                    data-bs-toggle="modal" data-bs-target="#modalEditarImovel{{$property->id}}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-danger" title="Excluir"
                                    data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $property->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @foreach($properties->where('user_id', auth()->id()) as $property)
            
            @include('admin.modals.propriedades.editar')

            @include('admin.modals.propriedades.excluir')

            @endforeach
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
