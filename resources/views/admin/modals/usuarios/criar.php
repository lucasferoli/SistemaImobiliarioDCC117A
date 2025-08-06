<div class="modal fade" id="modalAdicionarUsuario" tabindex="-1" aria-labelledby="modalAdicionarUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog">
                <form method="POST" action="{{ route('users.store') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                                <div class="modal-header">
                                        <h5 class="modal-title" id="modalAdicionarUsuarioLabel">Adicionar Novo Usuário</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body">
                                        <div class="mb-3">
                                                <label for="nameNovo" class="form-label">Nome</label>
                                                <input type="text" class="form-control" id="nameNovo" name="name" required autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                                <label for="emailNovo" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="emailNovo" name="email" required autocomplete="off">
                                        </div>
                                        <div class="mb-3">
                                                <label for="typeNovo" class="form-label">Tipo</label>
                                                <select class="form-select" id="typeNovo" name="role" required autocomplete="off">
                                                        <option value="admin">Admin</option>
                                                        <option value="user">Usuário</option>
                                                </select>
                                        </div>
                                        <div class="mb-3">
                                                <label for="passwordNovo" class="form-label">Senha</label>
                                                <input type="password" class="form-control" id="passwordNovo" name="password" required autocomplete="new-password">
                                        </div>
                                        <div class="mb-3">
                                                <label for="profile_image" class="form-label">Foto de Perfil (opcional)</label>
                                                <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/*">
                                                <small class="form-text text-muted">Se não adicionar, será usada a imagem padrão.</small>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-success">Adicionar Usuário</button>
                                </div>
                        </div>
                </form>
        </div>
</div>