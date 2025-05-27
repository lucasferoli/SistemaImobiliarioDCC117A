<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Imobiliária Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="<?php echo route('admin.dashboard'); ?>">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link active" href="<?php echo route('admin.imoveisCrud'); ?>">Imóveis</a></li>
                <li class="nav-item"><a class="nav-link active" href="<?php echo route('admin.usuariosCrud'); ?>">Usuarios</a></li>
                <li class="nav-item">
                    <form method="POST" action="<?php echo route('logout'); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="nav-link btn btn-link" style="text-decoration: none;">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>