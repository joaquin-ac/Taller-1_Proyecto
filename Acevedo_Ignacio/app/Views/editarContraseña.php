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

<body>

    <section class="vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">

                            <div class="card-body p-5">
                                <button onclick="location.href = '/Acevedo_ignacio/'" class="close" style="margin-left:95%" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 class="text-uppercase text-center mb-5">Edita tu Contraseña</h2>
                                <?php if (session()->getFlashdata('msg')): ?>
                                    <div class="alert alert-warning">
                                        <?= session()->getFlashdata('msg') ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($validation)): ?>
                                    <div class="alert alert-warning">
                                        <?= $validation->listErrors() ?>
                                    </div>
                                <?php endif; ?>
                                
                                <form action="/Acevedo_ignacio/edit_pass/changePass" method="post">

                                    <div class="form-outline form-group mb-4">
                                        <input type="password" name="oldPass" placeholder="Antigua Contraseña" 
                                            class="form-control form-control-lg" required />
                                    </div>

                                    <div class="form-outline form-group mb-4">
                                        <input type="password" name="newPass" placeholder="Nueva Contraseña"
                                            class="form-control form-control-lg" required />
                                    </div>

                                    <div class="form-outline form-group mb-4">
                                        <input type="password" name="confirmPassword" placeholder="Confirme la Nueva Contraseña"
                                            class="form-control form-control-lg" required />
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Guardar Cambios</button>
                                    </div>

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