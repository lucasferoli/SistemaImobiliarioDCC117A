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
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="mb-3">
                        <label for="title" class="form-label">Título</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="preco" class="form-label">Preço de Venda</label>
                        <input type="number" class="form-control" id="preco" name="buyPrice" required>
                    </div>
                    <div class="mb-3">
                        <label for="precoAluguel" class="form-label">Preço de Aluguel</label>
                        <input type="number" class="form-control" id="precoAluguel" name="rentPrice">
                    </div>
                    <input type="hidden" name="status" value="Disponível">
                    <div class="mb-3">
                        <label for="imagem" class="form-label">Imagem do Imóvel</label>
                        <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*">
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
