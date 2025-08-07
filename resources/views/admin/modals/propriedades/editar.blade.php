<div class="modal fade" id="modalEditarImovel{{$property->id}}" tabindex="-1"
    aria-labelledby="modalEditarImovelLabel{{$property->id}}" aria-hidden="true">
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
                        <input type="text" class="form-control" id="titulo{{$property->id}}" name="title"
                            value="{{ $property->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="descricao{{$property->id}}" class="form-label">Descrição</label>
                        <textarea class="form-control" id="descricao{{$property->id}}" name="description" rows="3"
                            required>{{ $property->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="endereco{{$property->id}}" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="endereco{{$property->id}}" name="address"
                            value="{{ $property->address }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="precoCompra{{$property->id}}" class="form-label">Preço de Compra</label>
                        <input type="number" class="form-control" id="precoCompra{{$property->id}}" name="buyPrice"
                            value="{{ $property->buyPrice }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="precoAluguel{{$property->id}}" class="form-label">Preço de Aluguel</label>
                        <input type="number" class="form-control" id="precoAluguel{{$property->id}}" name="rentPrice"
                            value="{{ $property->rentPrice }}">
                    </div>
                    <div class="mb-3">
                        <label for="imagem{{$property->id}}" class="form-label">Imagem do Imóvel</label>
                        <input type="file" class="form-control" id="imagem{{$property->id}}" name="image"
                            accept="image/*">
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
