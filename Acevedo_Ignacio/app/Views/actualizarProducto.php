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
            <div class="col">
                <?php if (isset($validation)): ?>
                    <div class="alert alert-warning">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>
                <button onclick="location.href = '/Acevedo_ignacio/productos'" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
                <form method="post" enctype="multipart/form-data"
                    action="/Acevedo_ignacio/actualizarProducto/<?= $producto['Id_producto'] ?>">
                    <div class="modal-header">

                        <h4 class="modal-title">Editar producto</h4>

                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="Nombre" id="Nombre" class="form-control"
                                value="<?= $producto['Nombre_producto'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Descripcion</label>
                            <input type="text" name="Descripcion" id="Descripcion" class="form-control"
                                value="<?= $producto['Descripcion_producto'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Categoria</label>
                            <select name="Categoria" id="Categoria" class="form-control" required>
                                <?php foreach ($categorias as $categoria) { ?>
                                    <option value='<?= $categoria['Id_categoria'] ?>'>
                                        <?= $categoria['Nombre_categoria'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Precio</label>
                            <input type="number" step="0.01" min="0" name="Precio" id="Precio" class="form-control"
                                value="<?= $producto['Precio_producto'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="number" min="0" name="Cantidad" id="Cantidad" class="form-control"
                                value="<?= $producto['Cantidad_producto'] ?>" required>
                        </div>
                        <div class="form-group">
                            <br>
                            <label>Seleccionar Imagen | </label>
                            <input type="file" name="userfile" size="20">
                        </div>
                        <div class="form-group">
                            <label>Activo - si/no</label>
                            <select name="Activo" id="Activo" class="form-control" required>
                                <option value="<?= $producto['Activo_producto'] ?>" selected hidden>
                                    <?= $producto['Activo_producto'] ?>
                                </option>
                                <option value="si">si</option>
                                <option value="no">no</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-info" value="Actualizar">
                    </div>
                </form>
                <button onclick="location.href = '/Acevedo_ignacio/productos'" style="margin-left:90%"
                    class="btn btn-default" data-dismiss="">Cancelar</button>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>