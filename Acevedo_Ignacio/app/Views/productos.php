<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./assets/crud.css">
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/iconoPag.svg" />
    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/crud.css">
    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            max-width: 100vw;
        }

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            min-width: 1000px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 15px;
            background: #0397d6;
            color: #fff;
            padding: 16px 30px;
            min-width: 100%;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .table-title .btn-group {
            float: right;
        }

        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 100px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }

        table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #F44336;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        /* Modal styles */
        .modal .modal-dialog {
            max-width: 40vw;
        }

        .modal .modal-header,
        .modal .modal-body,
        .modal .modal-footer {
            padding: 20px 30px;
        }

        .modal .modal-content {
            border-radius: 3px;
            font-size: 14px;
        }

        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }

        .modal .modal-title {
            display: inline-block;
        }

        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }

        .modal textarea.form-control {
            resize: vertical;
        }

        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }

        .modal form label {
            font-weight: normal;
        }
    </style>

    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/iconoPag.svg" />
    <title>admin</title>
</head>

<body class="min-vh-100 overflow-x-hidden">
    <section>
        <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand p-1 m-3 me-2 mt-1 mb-1 rounded-circle" href="/Acevedo_ignacio/">

                    <img src="<?= base_url() ?>/assets/img/iconoPag.svg" onerror="this.style.display='none'" alt=""
                        style="height: 3.5rem">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse ms-2" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-1 mb-lg-0">
                        <li class="nav-item ms-2">
                            <a class="nav-link" href="/Acevedo_ignacio/usuarios">Adminitrar Usuarios</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a class="nav-link" href="/Acevedo_ignacio/productos">Adminitrar Productos</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a class="nav-link" href="/Acevedo_ignacio/consultas">Consultas</a>
                        </li>
                        <li class="nav-item ms-5">
                            <a class="nav-link" href="/Acevedo_ignacio/facturas">Facturas</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto mb-1 ms-lg-0">
                        <li class="nav-item dropdown me-5 my-auto pe-5">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <?= session()->get('Apellido_usuario') . ", " . session()->get('Nombre_usuario') ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/Acevedo_ignacio/edit_perfil">Editar Perfil</a>
                                </li>
                                <li><a class="dropdown-item" href="/Acevedo_ignacio/edit_pass">Editar contraseña</a>
                                </li>
                                <li><a class="dropdown-item" href="/Acevedo_ignacio/cerrar_sesion">Cerrar Sesion</a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </section>
    <div class="container">
        <div class="table-responsive mx-auto">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <?php if (session()->getFlashdata('msg')): ?>
                            <div class="alert alert-warning">
                                <?= session()->getFlashdata('msg') ?>
                            </div>
                        <?php endif; ?>

                        <div class="col-sm-2">
                            <h2><b>Productos</b></h2>
                        </div>
                        <form class="form-inline col-lg-4 col-sm-4 pt-2" action="" method="get">
                            <div class="input-group">
                                <input name="nombre" id="nombre" placeholder="Buscar por nombre de producto..."
                                    type="search" class="form-control me-2" style="width:50%; height:2rem" />
                                <button id="search-button" type="submit" class="btn btn-success"
                                    style="width:5em; height:2rem"><img src="<?= base_url() ?>/assets/img/lupa.svg"
                                        onerror="this.style.display='none'" alt="" style="width:100%; height:100%">
                                </button>
                            </div>
                        </form>
                        <div class="col-sm-6">
                            <div class="row ms-5">

                                <a href="/Acevedo_ignacio/productos/no" class="btn btn-secondary col-3"><span>Ver
                                        productos
                                        dados de baja</span></a>
                                <a href="/Acevedo_ignacio/productos/si" class="btn btn-secondary me-5 col-3"><span>Ver
                                        productos
                                        activos</span></a>
                                <a href="#addProductModal" class="btn btn-success col-3"
                                    data-toggle="modal"><span>Agregar producto</span></a>

                            </div>

                        </div>
                    </div>
                </div>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Imagen Url</th>
                            <th>Activo</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $producto) { ?>
                            <tr>

                                <td>
                                    <?= $producto['Id_producto'] ?>
                                </td>
                                <td>
                                    <?= $producto['Nombre_producto'] ?>
                                </td>
                                <td>
                                    <?= $producto['Descripcion_producto'] ?>
                                </td>
                                <td>
                                    <?= $producto['Precio_producto'] ?>
                                </td>
                                <td>
                                    <?= $producto['Cantidad_producto'] ?>
                                </td>
                                <td>
                                    <?= $producto['url_imagen_producto'] ?>
                                </td>
                                <td>
                                    <?= $producto['Activo_producto'] ?>
                                </td>
                                <td>
                                    <?= $producto['Nombre_categoria'] ?>
                                </td>
                                <td>
                                    <div class="row">
                                        <a href="/Acevedo_ignacio/editarProducto/<?= $producto['Id_producto'] ?>"
                                            data-id="<?= $producto['Id_producto'] ?>" class="edit col-6" data-toggle=""><i
                                                class="material-icons" data-toggle="tooltip" title="Edit"></i></a>
                                        <a href="#" data-delete_id="<?= $producto['Id_producto'] ?>" class="delete col-6"
                                            data-toggle="" onclick="
                                            if (confirm('¿esta seguro de querer eliminar el producto <?= $producto['Nombre_producto'] ?>?')){
                                                window.location.replace('/Acevedo_ignacio/borrarProducto/<?= $producto['Id_producto'] ?>');
                                            }
                                        "><i class="material-icons" data-toggle="tooltip" title="Delete"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
        <?= $pager->links() ?>
    </div>
    <!-- Add Modal HTML -->
    <div id="addProductModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="post" enctype="multipart/form-data" action="/Acevedo_ignacio/agregarProducto">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar producto</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="Nombre" id="Nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Descripcion</label>
                            <input type="text" name="Descripcion" id="Descripcion" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Precio</label>
                            <input type="number" min='0' step="0.01" name="Precio" id="Precio" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="number" min='0' name="Cantidad" id="Cantidad" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Categoria</label>
                            <select name="Categoria" id="Categoria" class="form-control" required>
                                <?php foreach ($categorias as $categoria) { ?>
                                    <option value="<?= $categoria['Id_categoria'] ?>">
                                        <?= $categoria['Nombre_categoria'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <br>
                            <label>Seleccionar Imagen | </label>
                            <input type="file" name="userfile" size="20" accept="image/png, image/jpeg, image/*"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="submit" class="btn btn-info" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/carousel.js" integrity="" cross origin=""></script>
    <script src="<?= base_url() ?>/assets/js/bootstrap.bundle.min.js" integrity="" cross origin=""></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>

</html>