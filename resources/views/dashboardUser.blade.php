<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel do Usuário - Imóveis & Transações</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    @include('modais.navbar')

    <div class="container py-5">
        <h1 class="mb-4">Meu Painel</h1>

        <!-- Imóveis Anunciados -->
        <div class="card mb-5">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Meus Imóveis</h4>
            <!-- Botão para Anunciar Novo Imóvel -->
            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalNovoImovel">
                <i class="bi bi-plus-circle"></i> Anunciar Novo Imóvel
            </button>
            </div>
            <div class="card-body">
            <div class="row g-4">
            <!-- Modal Novo Imóvel -->
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
                    @foreach($properties as $property)
                        <div class="col-md-4">
                            <div class="card h-100">
                                <img src="https://via.placeholder.com/350x200?text=Casa+1" class="card-img-top" alt="Casa 1">
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
                                        <!-- Edit Button -->
                                        <button type="button" class="btn btn-sm btn-outline-primary me-1" title="Editar" data-bs-toggle="modal" data-bs-target="#modalEditarImovel{{$property->id}}">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <!-- Delete Button -->
                                        <button type="button" class="btn btn-sm btn-outline-danger" title="Excluir" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $property->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Modal -->
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

                        <!-- Delete Modal -->
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
                </div>
            </div>
        </div>

        <!-- Histórico de Transações -->
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h4 class="mb-0">Histórico de Transações</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Imóvel</th>
                            <th>Tipo</th>
                            <th>Status</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>10/06/2024</td>
                            <td>Apartamento Moderno</td>
                            <td>Aluguel</td>
                            <td><span class="badge bg-success">Concluída</span></td>
                            <td>R$ 1.200</td>
                        </tr>
                        <tr>
                            <td>15/05/2024</td>
                            <td>Casa Aconchegante</td>
                            <td>Venda</td>
                            <td><span class="badge bg-danger">Cancelada</span></td>
                            <td>R$ 150.000</td>
                        </tr>
                        <tr>
                            <td>25/04/2024</td>
                            <td>Kitnet</td>
                            <td>Venda</td>
                            <td><span class="badge bg-success">Concluída</span></td>
                            <td>R$ 60.000</td>
                        </tr>
                        <tr>
                            <td>30/03/2024</td>
                            <td>Apartamento Moderno</td>
                            <td>Aluguel</td>
                            <td><span class="badge bg-warning text-dark">Pendente</span></td>
                            <td>R$ 1.100</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
