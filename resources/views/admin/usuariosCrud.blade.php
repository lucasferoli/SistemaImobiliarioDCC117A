<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo - Usuários</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include resource_path('views/admin/modals/header.php'); ?>

<div class="container my-5">
    <h1 class="mb-4">Gerenciamento de Usuários</h1>
    <div class="mb-3">
      <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAdicionarUsuario">Adicionar Novo Usuário</a>
    </div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Email</th>
          <th>Tipo</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user) 
        <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->type}}</td>
        <td>
          <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditarUsuario{{$user->id}}">Editar</a>
          <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalExcluirUsuario{{$user->id}}">Excluir</a>
        </td>
        </tr>
        @endforeach
      </tbody>
      </table>
    </div>

    <!-- Modal Adicionar Usuário -->
    <div class="modal fade" id="modalAdicionarUsuario" tabindex="-1" aria-labelledby="modalAdicionarUsuarioLabel" aria-hidden="true">
      <div class="modal-dialog">
      <form method="POST" action="{{ route('users.store') }}" autocomplete="off">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-success">Adicionar Usuário</button>
      </div>
      </div>
      </form>
      </div>
    </div>

    @foreach($users as $user)
    <!-- Modal Editar Usuário -->
    <div class="modal fade" id="modalEditarUsuario{{$user->id}}" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel{{$user->id}}" aria-hidden="true">
      <div class="modal-dialog">
      <form method="POST" action="{{ route('users.update', $user->id) }}">
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
        <input type="text" class="form-control" id="name{{$user->id}}" name="name" value="{{$user->name}}" required>
        </div>
        <div class="mb-3">
        <label for="email{{$user->id}}" class="form-label">Email</label>
        <input type="email" class="form-control" id="email{{$user->id}}" name="email" value="{{$user->email}}" required>
        </div>
        <div class="mb-3">
        <label for="type{{$user->id}}" class="form-label">Tipo</label>
        <select class="form-select" id="type{{$user->id}}" name="type" required>
          <option value="admin" {{$user->type == 'admin' ? 'selected' : ''}}>Admin</option>
          <option value="user" {{$user->type == 'user' ? 'selected' : ''}}>Usuário</option>
        </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
      </div>
        </div>
      </form>
      </div>
    </div>

    <!-- Modal Excluir Usuário -->
    <div class="modal fade" id="modalExcluirUsuario{{$user->id}}" tabindex="-1" aria-labelledby="modalExcluirUsuarioLabel{{$user->id}}" aria-hidden="true">
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
    @endforeach

    
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
  </html>
