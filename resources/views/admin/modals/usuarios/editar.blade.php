<div class="modal fade" id="modalEditarUsuario{{$user->id}}" tabindex="-1"
    aria-labelledby="modalEditarUsuarioLabel{{$user->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarUsuarioLabel{{$user->id}}">Editar Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name{{$user->id}}" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name{{$user->id}}" name="name"
                            value="{{$user->name}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email{{$user->id}}" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email{{$user->id}}" name="email"
                            value="{{$user->email}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="type{{$user->id}}" class="form-label">Tipo</label>
                        <select class="form-select" id="type{{$user->id}}" name="type" required>
                            <option value="admin" {{$user->type == 'admin' ? 'selected' : ''}}>Admin</option>
                            <option value="user" {{$user->type == 'user' ? 'selected' : ''}}>Usuário</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto de Perfil Atual</label><br>
                        @if($user->image)
                        <img src="{{ asset($user->image) }}" alt="Foto de Perfil" class="img-thumbnail mb-2"
                            style="max-width: 120px;">
                        @else
                        <img src="{{ asset('assets/profileImage.png') }}" alt="Foto de Perfil Padrão"
                            class="img-thumbnail mb-2" style="max-width: 120px;">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="image{{$user->id}}" class="form-label">Alterar Foto de Perfil</label>
                        <input type="file" class="form-control" id="image{{$user->id}}" name="image" accept="image/*">
                        <small class="form-text text-muted">Se não selecionar, a imagem atual será mantida.</small>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </div>
                </div>
        </form>
    </div>
</div>
