<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="././acevedo_ignacio/assets/crud.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>


</head>

<body>
    <div id="editProductModal" class="container">
        <div class="row">
            <div class="col mt-5">
                <?php if (isset($validation)): ?>
                    <div class="alert alert-warning">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>
                <button class="close" onclick="location.href = '/Acevedo_ignacio/usuarios'"
                    aria-hidden="true">×</button>
                <form method="post" action="/Acevedo_ignacio/actualizarUsuario/<?= $usuario['Id_usuario'] ?>">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar Usuario</h4>

                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Id Usuario</label>
                            <input type="text" name="apellido" id="apellido" class="form-control" readonly
                                value="<?= $usuario['Id_usuario'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>DNI Usuario</label>
                            <input type="text" name="apellido" id="apellido" class="form-control" readonly
                                value="<?= $usuario['Dni_usuario'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="text" name="apellido" id="apellido" class="form-control" readonly
                                value="<?= $usuario['Apellido_usuario'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" readonly
                                value="<?= $usuario['Nombre_usuario'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Telefono</label>
                            <input type="text" name="apellido" id="apellido" class="form-control" readonly
                                value="<?= $usuario['Telefono_usuario'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class="form-control" readonly
                                value="<?= $usuario['Correo_usuario'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Activo - si/no</label>
                            <select name="Activo" id="Activo" class="form-control" required>

                                <option value="<?= $usuario['Activo_usuario'] ?>" selected hidden>
                                    <?= $usuario['Activo_usuario'] ?>
                                </option>
                                <option value="si">si</option>
                                <option value="no">no</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Rol</label>
                            <select name="Rol" id="Rol" class="form-control" required>
                                <option value="<?= $usuario['Nombre_rol'] ?>" selected hidden>
                                    <?= $usuario['Nombre_rol'] ?>
                                </option>
                                <?php foreach ($roles as $rol) { ?>
                                    <option value="<?= $rol['Id_rol'] ?>">
                                        <?= $rol['Nombre_rol'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-info" value="Actualizar">
                    </div>
                </form>
                <button onclick="location.href = '/Acevedo_ignacio/usuarios'" style="margin-left:90%"
                    class="btn btn-default" data-dismiss="">Cancelar</button>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>