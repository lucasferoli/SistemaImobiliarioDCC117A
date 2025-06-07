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
        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalNovoImovel">Adicionar Novo Imóvel</a>
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
                    <a href="{{ route('properties.show', $property->id) }}" class="btn btn-info btn-sm" target="_blank">Ver</a>
                    <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditarImovel{{$property->id}}">Editar</a>
                    <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalExcluirImovel{{$property->id}}">Excluir</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Novo Imóvel -->
<div class="modal fade" id="modalNovoImovel" tabindex="-1" aria-labelledby="modalNovoImovelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data">
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

@foreach($properties as $property)

<!-- Editar Imóvel Modals -->
 
<div class="modal fade" id="modalEditarImovel{{$property->id}}" tabindex="-1" aria-labelledby="modalEditarImovelLabel{{$property->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('properties.update', $property->id) }}" enctype="multipart/form-data">
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



<!-- Excluir Imóvel Modals -->
<div class="modal fade" id="modalExcluirImovel{{$property->id}}" tabindex="-1" aria-labelledby="modalExcluirImovelLabel{{$property->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('properties.destroy', $property->id) }}">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalExcluirImovelLabel{{$property->id}}">Excluir Imóvel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
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


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
