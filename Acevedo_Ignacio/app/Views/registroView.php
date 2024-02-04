<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>

    <link href="././assets/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        .gradient-custom-3 {
            /* fallback for old browsers */
            background: #84fab0;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
        }

        .gradient-custom-4 {
            /* fallback for old browsers */
            background: #84fab0;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
        }
    </style>

</head>

<body class="d-flex flex-column min-vh-100">

    <section class="d-flex flex-column min-vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center min-vh-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card" style="border-radius: 15px;">

                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Crea una cuenta</h2>
                                <?php if (isset($validation)): ?>
                                    <div class="alert alert-warning">
                                        <?= $validation->listErrors() ?>
                                    </div>
                                <?php endif; ?>
                                <form action="/Acevedo_ignacio/registro/store" method="post">


                                    <div class="row">
                                
                                    <label class="mb-2">Datos del Usuario:</label>

                                        <div class="form-outline form-group mb-4 col-lg-6 col-md-12">
                                            <input type="text" name="Nombre" placeholder="Nombre"
                                                value="<?= set_value('nombre') ?>" class="form-control form-control-lg"
                                                required />
                                        </div>

                                        <div class="form-outline form-group mb-4 col-lg-6 col-md-12">
                                            <input type="text" name="Apellido" placeholder="Apellido"
                                                value="<?= set_value('apellido') ?>"
                                                class="form-control form-control-lg" required />
                                        </div>

                                        <div class="form-outline form-group mb-4 col-lg-6 col-md-12">
                                            <input type="text" name="Telefono" placeholder="Telefono"
                                                value="<?= set_value('Telefono') ?>" class="form-control form-control-lg"
                                                required />
                                        </div>

                                        <div class="form-outline form-group mb-4 col-lg-6 col-md-12">
                                            <input type="email" name="Correo" placeholder="Correo"
                                                value="<?= set_value('Correo') ?>" class="form-control form-control-lg"
                                                required />
                                        </div>

                                        <div class="form-outline form-group mb-4 col-lg-6 col-md-12">
                                            <input type="password" name="Password" placeholder="Contraseña"
                                                class="form-control form-control-lg" required />
                                        </div>

                                        <div class="form-outline form-group mb-4 col-lg-6 col-md-12">
                                            <input type="number" name="DNI" id="DNI"
                                                placeholder="DNI"
                                                class="form-control form-control-lg" required />
                                        </div>

                                        <div class="form-outline form-group mb-4 col-lg-6 col-md-12">
                                            <input type="password" name="Confirmpassword" id="confirmpassword"
                                                placeholder="Confirme la Contraseña"
                                                class="form-control form-control-lg" required />
                                        </div>
                                    </div>

                                    <div class="row mt-5">

                                        <label class="mb-2">Datos del Domicilio:</label>

                                        <div class="form-outline form-group mb-4 col-lg-6 col-md-12">
                                            <input type="text" name="Calle" placeholder="Calle"
                                                value="<?= set_value('Calle') ?>" class="form-control form-control-lg"
                                                required />
                                        </div>

                                        <div class="form-outline form-group mb-4 col-lg-6 col-md-12">
                                            <input type="number" name="Numero" placeholder="Numero"
                                                value="<?= set_value('Numero') ?>"
                                                class="form-control form-control-lg" required />
                                        </div>

                                        <div class="form-outline form-group mb-4 col-lg-6 col-md-12">
                                            <input type="number" name="Codigo_postal" placeholder="Codigo Postal"
                                                value="<?= set_value('Codigo_postal') ?>" class="form-control form-control-lg"
                                                required />
                                        </div>

                                        <div class="form-outline form-group mb-4 col-lg-6 col-md-12">
                                            <input type="text" name="Localidad" placeholder="Localidad"
                                                value="<?= set_value('Localidad') ?>" class="form-control form-control-lg"
                                                required />
                                        </div>

                                        <div class="form-outline form-group mb-4 col-lg-6 col-md-12">
                                            <input type="text" name="Provincia" placeholder="Provincia"
                                                class="form-control form-control-lg" required />
                                        </div>

                                        <div class="form-outline form-group mb-4 col-lg-6 col-md-12">
                                            <input type="text" name="Pais" id="Pais"
                                                placeholder="Pais"
                                                class="form-control form-control-lg" required />
                                        </div>

                                    </div>


                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value=""
                                            id="form2Example3cg" required />
                                        <label class="form-check-label" for="form2Example3g">
                                            Acepto los <a href="/Acevedo_ignacio/term_y_usos"
                                                class="text-body"><u>terminos y usos</u></a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Registrarse</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">¿Ya tienes una cuenta? <a
                                            href="/Acevedo_ignacio/login" class="fw-bold text-body"><u>Inicia sesion
                                                aqui</u></a></p>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="././assets/js/bootstrap.bundle.min.js" integrity="" cross origin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>

</html>