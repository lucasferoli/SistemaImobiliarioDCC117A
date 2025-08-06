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

<?php include resource_path('views/admin/modals/header.php'); ?>

<div class="container my-5">
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

    <div class="card mb-5">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Meus Imóveis</h4>
            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalNovoImovel">
                <i class="bi bi-plus-circle"></i> Anunciar Novo Imóvel
            </button>
        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="modal fade" id="modalNovoImovel" tabindex="-1" aria-labelledby="modalNovoImovelLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('dashboard.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalNovoImovelLabel">Adicionar Novo Imóvel</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="titulo" class="form-label">Título</label>
                                        <input type="text" class="form-control" id="titulo" name="title" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="descricao" class="form-label">Descrição</label>
                                        <textarea class="form-control" id="descricao" name="description" rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="endereco" class="form-label">Endereço</label>
                                        <input type="text" class="form-control" id="endereco" name="address" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="precoCompra" class="form-label">Preço de Compra</label>
                                        <input type="number" class="form-control" id="precoCompra" name="buyPrice" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="precoAluguel" class="form-label">Preço de Aluguel</label>
                                        <input type="number" class="form-control" id="precoAluguel" name="rentPrice">
                                    </div>
                                    <div class="mb-3">
                                        <label for="imagem" class="form-label">Imagem do Imóvel</label>
                                        <input type="file" class="form-control" id="imagem" name="image" accept="image/*">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-success">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @foreach($properties->where('user_id', auth()->id()) as $property)
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="{{ $property->image ? asset('storage/' . $property->image) : 'https://via.placeholder.com/350x200?text=Casa+1' }}" class="card-img-top" alt="{{ $property->title }}">
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
                                <button type="button" class="btn btn-sm btn-outline-primary me-1" title="Editar" data-bs-toggle="modal" data-bs-target="#modalEditarImovel{{$property->id}}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-danger" title="Excluir" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $property->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modalEditarImovel{{$property->id}}" tabindex="-1" aria-labelledby="modalEditarImovelLabel{{$property->id}}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('dashboard.update', $property->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEditarImovelLabel{{$property->id}}">Editar Imóvel</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="titulo{{$property->id}}" class="form-label">Título</label>
                                        <input type="text" class="form-control" id="titulo{{$property->id}}" name="title" value="{{ $property->title }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="descricao{{$property->id}}" class="form-label">Descrição</label>
                                        <textarea class="form-control" id="descricao{{$property->id}}" name="description" rows="3" required>{{ $property->description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="endereco{{$property->id}}" class="form-label">Endereço</label>
                                        <input type="text" class="form-control" id="endereco{{$property->id}}" name="address" value="{{ $property->address }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="precoCompra{{$property->id}}" class="form-label">Preço de Compra</label>
                                        <input type="number" class="form-control" id="precoCompra{{$property->id}}" name="buyPrice" value="{{ $property->buyPrice }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="precoAluguel{{$property->id}}" class="form-label">Preço de Aluguel</label>
                                        <input type="number" class="form-control" id="precoAluguel{{$property->id}}" name="rentPrice" value="{{ $property->rentPrice }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="imagem{{$property->id}}" class="form-label">Imagem do Imóvel</label>
                                        <input type="file" class="form-control" id="imagem{{$property->id}}" name="image" accept="image/*">
                                        @if($property->image)
                                            <img src="{{ asset('storage/' . $property->image) }}" alt="Imagem atual" class="img-thumbnail mt-2" style="max-width: 150px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="deleteModal-{{ $property->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $property->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('dashboard.destroy', $property->id) }}">
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel-{{ $property->id }}">Excluir Imóvel</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Tem certeza que deseja excluir o imóvel <strong>{{ $property->title }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
