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
    <div class="card mx-auto" style="max-width: 700px;">
        <div class="d-flex justify-content-center align-items-center pt-3" style="height: 350px; overflow: hidden;">
            <img src="{{ asset($property->image) }}" class="card-img-top" alt="Imagem do Imóvel" style="max-height: 100%; max-width: 100%; object-fit: contain;">
        </div>
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
                @if($property->status === 'sold' || $property->status === 'rented')
                    <a href="{{ url('/') }}" class="btn btn-secondary w-100">
                        Propriedade está Indisponível
                    </a>
                @else
                    @if(Auth::check())
                        @if(Auth::id() === $property->user_id)
                            <a href="{{ url('/dashboard') }}" class="btn btn-warning w-100">
                                Este imóvel já é seu, Edite ele ou Delete o anúncio na sua dashboard
                            </a>
                        @else
                            <!-- Botões que abrem os modais -->
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#buyModal">Comprar</button>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rentModal">Alugar</button>
                        @endif
                    @else
                        <!-- Botões que redirecionam para login -->
                        <a href="{{ route('login') }}" class="btn btn-primary">
                            Você só pode Comprar ou Alugar um Imovel estando Logado.
                        </a>
                    @endif
                @endif
            </div>

            <!-- Modal de Confirmação de Compra -->
            <form method="POST" action="{{ route('individual.store', ['id' => $property->id]) }}">
                @csrf
                <div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="buyModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="buyModalLabel">Confirmar Compra</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                            </div>
                            <div class="modal-body">
                                Tem certeza que deseja comprar este imóvel por
                                <strong>R$ {{ number_format($property->buyPrice ?? 0, 2, ',', '.') }}</strong>?
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <input type="hidden" name="totalPrice" value="{{ $property->buyPrice }}">
                                <input type="hidden" name="status" value="sold">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success" id="confirmBuyBtn">Confirmar Compra</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Modal de Confirmação de Aluguel -->
            <form method="POST" action="{{ route('individual.store', ['id' => $property->id]) }}">
                @csrf
                <div class="modal fade" id="rentModal" tabindex="-1" aria-labelledby="rentModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="rentModalLabel">Confirmar Aluguel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                            </div>
                            <div class="modal-body">
                                Tem certeza que deseja alugar este imóvel por
                                <strong>R$ {{ number_format($property->rentPrice ?? 0, 2, ',', '.') }}</strong> por mês?
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <input type="hidden" name="rentPrice" value="{{ $property->rentPrice }}">
                                <input type="hidden" name="status" value="rented">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary" id="confirmRentBtn">Confirmar Aluguel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
