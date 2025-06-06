<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('modais.navbar')

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow">
        <div class="card-body text-center">
          <img src="{{ asset('assets/profileImage.png') }}" alt="Foto Do Usuario" style="height:112px;vertical-align:middle;">
          <h3 class="card-title mb-1">{{ Auth::user()->name }}</h3>
          <p class="text-muted mb-3">{{ Auth::user()->email }}</p>
          <hr>
          <div class="row mb-3">
            <div class="col-6 text-end fw-bold">Perfil Criado em:</div>
            <div class="col-6 text-start">{{ Auth::user()->created_at->format('d/m/Y') }}</div>
          </div>
          <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#editProfileModal">
            Editar Perfil
          </button>
          <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#deleteProfileModal">
            Deletar Perfil
          </button>
        </div>
      </div>

      <!-- Edit Profile Modal -->
      <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
        <form method="POST" action="{{ route('profile.update') }}">
          @csrf
          @method('PUT')
          <div class="modal-header">
            <h5 class="modal-title" id="editProfileModalLabel">Editar Perfil</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
            </div>
            <div class="mb-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
            </div>
            <!-- Add more fields as needed -->
            <div class="mb-3">
              <button type="button" class="btn btn-warning" id="showChangePassword">Alterar senha?</button>
            </div>
            <div id="changePasswordFields" style="display:none;">
          <div class="mb-3">
            <label for="current_password" class="form-label">Senha atual</label>
            <input type="password" class="form-control" id="current_password" name="current_password">
          </div>
          <div class="mb-3">
            <label for="new_password" class="form-label">Nova senha</label>
            <input type="password" class="form-control" id="new_password" name="new_password">
          </div>
          <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Confirme a nova senha</label>
            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
          </div>
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
      
      <script>
        document.addEventListener('DOMContentLoaded', function () {
          var showBtn = document.getElementById('showChangePassword');
          var fields = document.getElementById('changePasswordFields');
          if (showBtn) {
        showBtn.addEventListener('click', function () {
          fields.style.display = 'block';
          showBtn.style.display = 'none';
        });
          }
        });
      </script>

      <!-- Delete Confirmation Modal -->
      <div class="modal fade" id="deleteProfileModal" tabindex="-1" aria-labelledby="deleteProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <form method="POST" action="{{ route('profile.destroy') }}">
              @csrf
              @method('DELETE')
              <div class="modal-header">
                <h5 class="modal-title" id="deleteProfileModalLabel">Confirmar Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
              </div>
              <div class="modal-body">
                Tem certeza que deseja deletar seu perfil? Esta ação não pode ser desfeita.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Deletar</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
    <!-- Bootstrap JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>