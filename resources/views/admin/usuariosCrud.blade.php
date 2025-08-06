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
            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAdicionarUsuario">Adicionar
                Novo Usuário</a>
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
                        <a class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalEditarUsuario{{$user->id}}">Editar</a>
                        <a class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#modalExcluirUsuario{{$user->id}}">Excluir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal Adicionar Usuário -->
    @include('admin.modals.usuarios.criar')

@foreach($users as $user)

    <!-- Modal Editar Usuário -->
    @include('admin.modals.usuarios.editar', ['user' => $user])

    <!-- Modal Excluir Usuário -->
    @include('admin.modals.usuarios.excluir', ['user' => $user])

@endforeach

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
