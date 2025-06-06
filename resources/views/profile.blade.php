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
                            <div class="col-6 text-end fw-bold">Telefone:</div>
                            <div class="col-6 text-start"> {{ Auth::user()->phone }} </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 text-end fw-bold">Endereço:</div>
                            <div class="col-6 text-start"> {{ Auth::user()->address }} </div>
                        </div>
                        <div class="row mb-3">
                        </div>
                        <a href="#" class="btn btn-primary mt-3">Editar Perfil</a>
                        <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#deleteProfileModal">
                            Deletar Perfil
                        </button>
                    </div>
                </div>

                <!-- Delete Confirmation Modal -->
                <div class="modal fade" id="deleteProfileModal" tabindex="-1" aria-labelledby="deleteProfileModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="deleteProfileModalLabel">Confirmar Exclusão</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                      </div>
                      <div class="modal-body">
                        Tem certeza que deseja deletar seu perfil? Esta ação não pode ser desfeita.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger">Deletar</button>
                        </form>
                      </div>
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