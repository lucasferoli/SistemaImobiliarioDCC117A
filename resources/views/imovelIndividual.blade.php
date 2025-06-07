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
                @if(Auth::check())
                    <!-- Botões que abrem os modais -->
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#buyModal">Comprar</button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rentModal">Alugar</button>
                @else
                    <!-- Botões que redirecionam para login -->
                    <a href="{{ route('login') }}" class="btn btn-success">Comprar</a>
                    <a href="{{ route('login') }}" class="btn btn-primary">Alugar</a>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmação de Compra -->
<div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="buyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="buyModalLabel">Confirmar Compra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja comprar este imóvel por <strong>R$ {{ number_format($property->buyPrice ?? 0, 2, ',', '.') }}</strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success" id="confirmBuyBtn">Confirmar Compra</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmação de Aluguel -->
<div class="modal fade" id="rentModal" tabindex="-1" aria-labelledby="rentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rentModalLabel">Confirmar Aluguel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja alugar este imóvel por <strong>R$ {{ number_format($property->rentPrice ?? 0, 2, ',', '.') }}</strong> por mês?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="confirmRentBtn">Confirmar Aluguel</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Loading -->
<div class="modal fade" id="loadingModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center border-0 shadow-none" style="background: transparent;">
            <div class="modal-body p-0">
                <div class="bg-white rounded p-4 d-inline-block">
                    <img src="{{ asset('assets/patoLoading.gif') }}" alt="Carregando..." style="width:240px;">
                    <div class="mt-2">Processando...</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Sucesso -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Sucesso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body" id="successModalBody">
                <!-- Mensagem de sucesso será inserida via JS -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
        var buyModal = new bootstrap.Modal(document.getElementById('buyModal'));
        var rentModal = new bootstrap.Modal(document.getElementById('rentModal'));
        var loadingModal = new bootstrap.Modal(document.getElementById('loadingModal'));
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));

        document.getElementById('confirmBuyBtn').addEventListener('click', function () {
                buyModal.hide();
                setTimeout(function () {
                        loadingModal.show();
                        setTimeout(function () {
                                loadingModal.hide();
                                document.getElementById('successModalBody').innerHTML = 'Imóvel comprado com sucesso!';
                                successModal.show();
                        }, 4000);
                }, 500);
        });

        document.getElementById('confirmRentBtn').addEventListener('click', function () {
                rentModal.hide();
                setTimeout(function () {
                        loadingModal.show();
                        setTimeout(function () {
                                loadingModal.hide();
                                document.getElementById('successModalBody').innerHTML = 'Imóvel alugado com sucesso!';
                                successModal.show();
                        }, 4000);
                }, 500);
        });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>