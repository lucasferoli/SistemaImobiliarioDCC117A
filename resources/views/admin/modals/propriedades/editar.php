<div class="modal fade" id="modalEditarImovel{{$property->id}}" tabindex="-1" aria-labelledby="modalEditarImovelLabel{{$property->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="#" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarImovelLabel{{$property->id}}">Editar Imóvel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                        <input type="hidden" name="user_id" value="{{ $property->user_id }}">
                        <div class="mb-3">
                                <label for="titulo{{$property->id}}" class="form-label">Título</label>
                                <input type="text" class="form-control" id="titulo{{$property->id}}" name="titulo" value="{{ $property->title }}" required>
                        </div>
                        <div class="mb-3">
                                <label for="endereco{{$property->id}}" class="form-label">Endereço</label>
                                <input type="text" class="form-control" id="endereco{{$property->id}}" name="endereco" value="{{ $property->address }}" required>
                        </div>
                        <div class="mb-3">
                                <label for="tipo{{$property->id}}" class="form-label">Tipo</label>
                                <select class="form-select" id="tipo{{$property->id}}" name="tipo" required>
                                        <option value="">Selecione</option>
                                        <option value="Apartamento" @if($property->type == 'Apartamento') selected @endif>Apartamento</option>
                                        <option value="Casa" @if($property->type == 'Casa') selected @endif>Casa</option>
                                        <option value="Comercial" @if($property->type == 'Comercial') selected @endif>Comercial</option>
                                </select>
                        </div>
                        <div class="mb-3">
                                <label for="preco{{$property->id}}" class="form-label">Preço</label>
                                <input type="number" class="form-control" id="preco{{$property->id}}" name="preco" value="{{ $property->buyPrice }}" required>
                        </div>
                        <div class="mb-3">
                                <label for="status{{$property->id}}" class="form-label">Status</label>
                                <select class="form-select" id="status{{$property->id}}" name="status" required>
                                        <option value="Disponível" @if($property->status == 'Disponível') selected @endif>Disponível</option>
                                        <option value="Vendido" @if($property->status == 'Vendido') selected @endif>Vendido</option>
                                        <option value="Alugado" @if($property->status == 'Alugado') selected @endif>Alugado</option>
                                </select>
                        </div>
                        <div class="mb-3">
                                <label for="imagem{{$property->id}}" class="form-label">Imagem do Imóvel</label>
                                <input type="file" class="form-control" id="imagem{{$property->id}}" name="imagem" accept="image/*">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>