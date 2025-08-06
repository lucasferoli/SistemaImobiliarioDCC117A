    <div class="modal fade" id="modalExcluirUsuario{{$user->id}}" tabindex="-1"
        aria-labelledby="modalExcluirUsuarioLabel{{$user->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalExcluirUsuarioLabel{{$user->id}}">Excluir Usuário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir o usuário <strong>{{$user->name}}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </div>
                </div>
            </form>
        </div>
    </div>