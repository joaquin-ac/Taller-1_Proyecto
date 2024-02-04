<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="././assets/css/miestilo.css" rel="stylesheet" integrity="" crossorigin="">
    <link href="././assets/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="">
    <link href="../assets/css/miestilo.css" rel="stylesheet" integrity="" crossorigin="">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="">

    <title>Document</title>
</head>

<body>
    <section class="container">
        <div class="row mt-5 mb-5">
            <div class="col-ms-2"></div>
            <!--Section: Contact v.2-->
            <section class="mb-4 col-md-8 mx-auto">

                <!--Section heading-->
                <h1 class="h1-responsive font-weight-bold text-center mb-4">Consulta id:
                    <?= $consulta['Id_consulta'] ?>
                </h1>
                <h1 class="h1-responsive font-weight-bold text-center mb-4">Id de usuario:
                    <?= ($consulta['Id_usuario'])?: 'No registrado'; ?>
                </h1>
                <!--Section description-->

                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12 mb-md-0 mb-1">
                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <hr>
                                    <h5>Nombre</h5>
                                    <hr>
                                    <h3>
                                        <?= $consulta['Nombre_consulta'] ?>
                                    </h3>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <hr>
                                    <h5>Apellido</h5>
                                    <hr>
                                    <h3>
                                        <?= $consulta['Apellido_consulta'] ?>
                                    </h3>
                                </div>
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <hr>
                                    <h5>Email</h5>
                                    <hr>
                                    <h3>
                                        <?= $consulta['Correo_consulta'] ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <hr>
                                    <h5>Asunto</h5>
                                    <hr>
                                    <h3>
                                        <?= $consulta['Asunto_consulta'] ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row mt-5">

                            <!--Grid column-->
                            <div class="col-md-12">

                                <div class="md-form">
                                    <hr>
                                    <h5>Mensaje</h5>
                                    <hr>
                                    <h3>
                                        <?= $consulta['Mensaje_consulta'] ?>
                                    </h3>
                                </div>

                            </div>
                        </div>

                        <div class="text-center text-md-left mt-5 row">
                            <a class="btn btn-success shadow col-4 ms-5 me-5" href='/Acevedo_ignacio/consultas'
                                type="submit">volver</a>
                            <a class="btn btn-success shadow col-4 ms-5 me-5" href='/Acevedo_ignacio/borrarConsulta/<?= $consulta['Id_consulta'] ?>'
                                type="submit">Marcar como leido</a>
                        </div>

                    </div>
                    

            </section>
            <!--Section: Contact v.2-->
            <div class="col-ms-2"></div>
        </div>
    </section>

</body>

</html>