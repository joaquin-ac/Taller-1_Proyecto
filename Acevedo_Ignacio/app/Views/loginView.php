<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>

    <link href="<?= base_url()?>/assets/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="">

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
                                <button onclick="location.href = '/Acevedo_ignacio/'" class="close"
                                    style="margin-left:95%" data-dismiss="modal" aria-hidden="true">×</button>
                                <h2 class="text-uppercase text-center mb-5">Inicia Sesion</h2>
                                <?php if (session()->getFlashdata('login')): ?>
                                    <div class="alert alert-warning">
                                        <?= session()->getFlashdata('login') ?>
                                    </div>
                                <?php endif; ?>
                                <form action="/Acevedo_ignacio/login/loginAuth" method="post">

                                    <div class="form-outline form-group mb-4">
                                        <input type="email" name="email" id="email" placeholder="Email"
                                            value="<?= set_value('email') ?>" class="form-control form-control-lg"
                                            required />
                                    </div>

                                    <div class="form-outline form-group mb-4">
                                        <input type="password" name="pass" placeholder="Contraseña"
                                            class="form-control form-control-lg" required />
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Iniciar
                                            Sesion</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">¿Todavia no tienes una cuenta? <a
                                            href="/Acevedo_ignacio/registro" class="fw-bold text-body"><u>Registrate
                                                aqui</u></a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?= base_url()?>/assets/js/bootstrap.bundle.min.js" integrity="" cross origin=""></script>

</body>

</html>