<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Imóvel Individual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('modais.navbar')

<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 600px;">
        @if(isset($property->image) && filter_var($property->image, FILTER_VALIDATE_URL))
            <img src="{{ $property->image }}" class="card-img-top" alt="Imagem do Imóvel">
        @endif
        <div class="card-body">
            <h3 class="card-title">{{ $property->title ?? 'Título não disponível' }}</h3>
            <p class="card-text">{{ $property->description ?? 'Descrição não disponível' }}</p>
            <ul class="list-group list-group-flush mb-3">
            <li class="list-group-item"><strong>ID:</strong> {{ $property->id ?? '-' }}</li>
            <li class="list-group-item"><strong>Endereço:</strong> {{ $property->address ?? '-' }}</li>
            <li class="list-group-item"><strong>Preço de Compra:</strong> R$ {{ number_format($property->buyPrice ?? 0, 2, ',', '.') }}</li>
            <li class="list-group-item"><strong>Preço de Aluguel:</strong> R$ {{ number_format($property->rentPrice ?? 0, 2, ',', '.') }}</li>
            <li class="list-group-item"><strong>Status:</strong> {{ $property->status ?? '-' }}</li>
            <li class="list-group-item"><strong>ID do Usuário:</strong> {{ $property->user_id ?? '-' }}</li>
            <li class="list-group-item"><strong>Criado em:</strong> {{ isset($property->created_at) ? $property->created_at->format('d/m/Y') : '-' }}</li>
            </ul>
            <div class="d-flex gap-2">
                <form action="#" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Comprar</button>
                </form>
                <form action="#" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Alugar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>