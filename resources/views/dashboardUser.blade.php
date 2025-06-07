<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel do Usuário - Imóveis & Transações</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    @include('modais.navbar')

    <div class="container py-5">
        <h1 class="mb-4">Meu Painel</h1>

        <!-- Imóveis Anunciados -->
        <div class="card mb-5">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Meus Imóveis</h4>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    @foreach($properties as $property)
                        <div class="col-md-4">
                            <div class="card h-100">
                                <img src="https://via.placeholder.com/350x200?text=Casa+1" class="card-img-top" alt="Casa 1">
                                <div class="card-body">
                                    <h5 class="card-title">{{$property->title}}</h5>
                                    <p class="card-text"><br>Localização: {{$property->address}}</p>
                                    <span class="badge bg-success">À Venda</span>
                                </div>
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        Anunciado em: {{ $property->created_at->format('d/m/Y') }}
                                    </small>
                                    <div>
                                        <a href="" class="btn btn-sm btn-outline-primary me-1" title="Editar">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir este imóvel?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Bootstrap Icons CDN -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
            

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
</body>
</html>