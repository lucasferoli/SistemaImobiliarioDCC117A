<div class="modal fade" id="deleteModal-{{ $property->id }}" tabindex="-1"
    aria-labelledby="deleteModalLabel-{{ $property->id }}" aria-hidden="true">
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
