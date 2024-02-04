<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/iconoPag.svg" />
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/iconoPag.svg" />
    <title>Sartorial</title>

    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="">
    <link href="<?= base_url() ?>/assets/css/catalogo.css" rel="stylesheet" integrity="" crossorigin="">
    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="">
    <link href="<?= base_url() ?>/assets/css/catalogo.css" rel="stylesheet" integrity="" crossorigin="">


    <style>
        a {
            text-decoration: none;
        }

        p {
            text-align: justify;
        }
    </style>

</head>

<body class="d-flex flex-column min-vh-100">

<?php if (session()->get('isLoggedIn') && session()->get('isAdmin')): ?>
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
    <?php else: ?>
        <section>
            <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
                <div class="container-fluid">
                    <a class="navbar-brand p-1 m-3 me-2 mt-1 mb-1 rounded-circle" href="/Acevedo_ignacio/">
                        <img src="<?= base_url() ?>/assets/img/iconoPag.svg" alt="" style="height: 3.5rem">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse ms-2" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-1 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Productos
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/Acevedo_ignacio/catalogo">Ver todos los
                                            productos</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Acerca
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/Acevedo_ignacio/quienes_somos">Quienes Somos</a>
                                    </li>
                                    <li><a class="dropdown-item" href="/Acevedo_ignacio/contactos">
                                            <?php if (session()->get('isLoggedIn')): ?>
                                                Consulta
                                            <?php else: ?>
                                                Contacto
                                            <?php endif; ?>
                                        </a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="/Acevedo_ignacio/comercializacion">Comercialización</a></li>
                                    <li><a class="dropdown-item" href="/Acevedo_ignacio/term_y_usos">Terminos y Usos</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <?php if (session()->get('isLoggedIn')): ?>
                            <ul class="navbar-nav ms-auto mb-1 ms-lg-0">
                                <li class="nav-item dropdown me-3 my-auto">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <?= session()->get('Apellido_usuario') . ", " . session()->get('Nombre_usuario') ?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/Acevedo_ignacio/edit_perfil">Editar Perfil</a>
                                        </li>
                                        <li><a class="dropdown-item" href="/Acevedo_ignacio/edit_pass">Editar contraseña</a>
                                        </li>
                                        <li><a class="dropdown-item" href="/Acevedo_ignacio/historial">Historial de compras</a>
                                        </li>
                                        <li><a class="dropdown-item" href="/Acevedo_ignacio/cerrar_sesion">Cerrar Sesion</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="my-auto">
                                    <a class="nav-link link-success me-5" href="/Acevedo_ignacio/carrito">
                                        <img src="<?= base_url() ?>/assets/img/carrito.svg" style="width: 2.5em" alt="carrito">
                                    </a>
                                </li>

                            </ul>
                        <?php else: ?>
                            <ul class="navbar-nav ms-auto mb-1 ms-lg-0">
                                <li>
                                    <a class="nav-link link me-3" href="/Acevedo_ignacio/login">Iniciar Sesion</a>
                                </li>
                                <li>
                                    <a class="nav-link link-success me-3" href="/Acevedo_ignacio/registro">Registrarse</a>
                                </li>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </section>
    <?php endif; ?>
    <section>
        <div class="container my-5">
            <div class="row">
                <?php if (session()->getFlashdata('msg')): ?>
                    <div class="alert alert-warning">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif; ?>
                <form class="form-inline col-lg-6 col-sm-8 mx-auto" id="busquedaForm" action="" method="get">
                    <div class="input-group">
                        <input name="nombre" id="nombre" placeholder="Buscar producto..." type="search"
                            class="form-control me-2 mb-2" style="width:50%; height:3rem" value="<?= $nombre ?>" />
                        <button id="search-button" type="submit" class="btn btn-success me-4"
                            style="width:5em; height:3em"><img src="<?= base_url() ?>/assets/img/lupa.svg" alt=""
                                style="width:100%; height:100%"></button>
                        <select name="order" id='order' class="mb-2" onchange="this.form.submit()">
                            <option value="" selected disabled hidden>
                                Ordenar por:
                            </option>
                            <option value="Producto.Precio_producto">
                                precio
                            </option>
                            <option value="Producto.Nombre_producto">
                                nombre
                            </option>
                            <option value="Categoria.Nombre_Categoria">
                                categoria
                            </option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="row">


                <?php if (!$productos) { ?>
                    <div class="col-12">
                        <h1 class="mt-5 text-center display-4 min-vh-90">no hubo resultados para su busqueda. Intente mas
                            tarde o pruebe
                            buscando algo mas...</h1>
                    </div>
                <?php } else {
                    foreach ($productos as $producto) { ?>
                        <?php if ($producto['Cantidad_producto'] <= 0) {
                            continue;
                        } ?>
                        <div class="col-lg-3 col-sm-6 d-flex align-items-end">
                            <div class="product-grid" style="min-width:100%">
                                <div class="product-image">
                                    <div 
                                        class="image d-flex align-items-center my-4" style="height:30em">
                                        <img
                                            src="<?= base_url() ?>/assets/img/productos/<?= $producto['url_imagen_producto'] ?>">
                                    </div>
                                    <?php if (session()->get('isLoggedIn')): ?>
                                        <a href="/Acevedo_ignacio/agregarCarrito/<?= $producto['Id_producto'] ?>"
                                            class="add-to-cart">Agregar
                                            Al
                                            Carrito</a>
                                    <?php else: ?>
                                        <a href="/Acevedo_ignacio/login" class="add-to-cart" style="background: #cf4437a5">Inicia
                                            Sesion
                                            Para agregar al carrito</a>
                                    <?php endif ?>

                                </div>
                                <div class="product-content">
                                    <h4 class="title justify-content-center" style="height: 3rem;">
                                        <p class="h4 text-center">
                                            <?= $producto['Nombre_producto'] ?>
                                        </p>
                                    </h4>
                                    <h4 class="title h1" style="height: 4rem;">
                                        <p class="h6 text-center">
                                            <?= $producto['Descripcion_producto'] ?>
                                        </p>
                                    </h4>
                                    <p class="text-muted text-center">En stock:
                                        <?= $producto['Cantidad_producto'] ?>
                                    </p>
                                    <p class="text-muted text-center">Categoria:
                                        <?= $producto['Nombre_categoria'] ?>
                                    </p>
                                    <div class="price">
                                        Precio: &dollar;
                                        <?= number_format($producto['Precio_producto'], 2, ',', '.') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>

            </div>

        </div>
    </section>

    <section class="paginacion">

        <?= $pager->links(); ?>
    </section>

    <section class="mt-auto footer">
        <!-- Footer -->
        <footer class="text-center text-light mt-auto" data-bs-theme="dark" style="background-color: #333333;">
            <!-- Grid container -->
            <div class="container p-2">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-link btn-floating btn-lg text-white m-1" href="#!" role="button"
                        data-lgb-ripple-color="dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white"
                            class="bi bi-facebook" viewBox="0 0 16 16">
                            <path
                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                        </svg>
                    </a>

                    <!-- Twitter -->
                    <a class="btn btn-link btn-floating btn-lg text-white m-1" href="#!" role="button"
                        data-lgb-ripple-color="dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white"
                            class="bi bi-twitter" viewBox="0 0 16 16">
                            <path
                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                        </svg>
                    </a>

                    <!-- Github -->
                    <a class="btn btn-link btn-floating btn-lg text-white m-1" href="#!" role="button"
                        data-lgb-ripple-color="dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-github"
                            viewBox="0 0 16 16">
                            <path
                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                        </svg>
                    </a>

                    <!-- Instagram -->
                    <a class="btn btn-link btn-floating btn-lg text-white m-1" href="#!" role="button"
                        data-lgb-ripple-color="dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white"
                            class="bi bi-instagram" viewBox="0 0 16 16">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                        </svg>
                    </a>
                </section>
                <!-- Section: Social media -->

                <!-- Section: Links -->
                <section class="">
                    <!--Grid row-->
                    <div class="row">
                        <!--Grid column-->
                        <div class="col-lg-4 mb-4 mb-lg-2">
                            <h5 class="text-uppercase">Acerca de la Empresa</h5>

                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="/Acevedo_ignacio/quienes_somos" class="text-white">Quienes Somos</a>
                                </li>
                                <li>
                                    <a href="/Acevedo_ignacio/contactos" class="text-white">
                                        <?php if (session()->get('isLoggedIn')): ?>
                                            Consulta
                                        <?php else: ?>
                                            Contacto
                                        <?php endif; ?>
                                    </a>

                                </li>
                                <li>
                                    <a href="/Acevedo_ignacio/comercializacion" class="text-white">Comercialización</a>
                                </li>
                                <li>
                                    <a href="/Acevedo_ignacio/term_y_usos" class="text-white">Términos y usos</a>
                                </li>
                                <li>
                                    <a class="text-white">FAQs</a>
                                </li>
                            </ul>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-lg-4 mb-4 mb-lg-2">
                            <h5 class="text-uppercase">Contactos</h5>

                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a class="text-white">Telefono: +54 01 234 567 89</a>
                                </li>
                                <li>
                                    <a class="text-white">info@sartorialco.com</a>
                                </li>
                                <li>
                                    <a class="text-white">Calle: 9 de Julio 1449</a>
                                </li>
                            </ul>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-lg-4 mb-4 mb-lg-2">
                            <h5 class="text-uppercase">Productos</h5>

                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="/Acevedo_ignacio/catalogo" class="text-white">Ver todos los productos</a>
                                </li>
                            </ul>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </section>
                <!-- Section: Links -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                <strong>
                    © 2023 Copyright:
                    <a class="text-white" href="/Acevedo_ignacio/">Sartorial</a>
                </strong>

            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </section>

    <script src="<?= base_url() ?>/assets/js/bootstrap.bundle.min.js" integrity="" cross origin=""></script>
</body>

</html>