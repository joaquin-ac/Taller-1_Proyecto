<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="../assets/css/facturacion.css" rel="stylesheet" integrity="" crossorigin="">
    <link href="./assets/css/facturacion.css" rel="stylesheet" integrity="" crossorigin="">

    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="">

    <style>
        .factura {
            table-layout: fixed;
        }

        .fact-info>div>h5 {
            font-weight: bold;
        }

        .factura>thead {
            border-top: solid 3px #000;
            border-bottom: 3px solid #000;
        }

        .factura>thead>tr>th:nth-child(2),
        .factura>tbod>tr>td:nth-child(2) {
            width: 300px;
        }

        .factura>thead>tr>th:nth-child(n+3) {
            text-align: right;
        }

        .factura>tbody>tr>td:nth-child(n+3) {
            text-align: right;
        }

        .factura>tfoot>tr>th,
        .factura>tfoot>tr>th:nth-child(n+3) {
            font-size: 24px;
            text-align: right;
        }

        .cond {
            border-top: solid 2px #000;
        }
        @media print{
            button{
                display: none;
            }
            .btn{
                display: none;
            }
            .btn-success{
                display: none;
            }
        }
    </style>

    <style type="text/css" media="print">
        @media print{
            button{
                display: none;
            }
            .btn{
                display: none;
            }
            .btn-success{
                display: none;
            }
        }
    </style>

    <link rel="icon" type="image/png" href="././assets/img/iconoPag.svg" />
    <title>Sartorial</title>
</head>

<body class="container">

    <div id="app" class="col-12">

        <h2>Factura</h2>

        <div class="row my-3">
            <div class="col-10">
                <h1>Sartorial</h1>
                <p>Calle 9 de Julio 1449</p>
            </div>
            <div class="col-2">
                <img src="././assets/img/iconoPagFactura.svg" onerror="this.style.display='none'" alt="" style="height: 8rem">
                <img src="../assets/img/iconoPagFactura.svg" onerror="this.style.display='none'" alt="" style="height: 8rem">
            </div>
        </div>

        <hr />

        <div class="row fact-info mt-3">
            <div class="col-3">
                <h5>Facturar a</h5>
                <p>
                    <?= $facturacion['Cabecera_Factura']['Nombre_usuario'] ?>
                    <?= $facturacion['Cabecera_Factura']['Apellido_usuario'] ?>
                </p>
            </div>
            <div class="col-3">
                <h5>ID de factura</h5>
                <h5>
                    <?= $facturacion['Cabecera_Factura']['Id_factura'] ?>
                </h5>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-6">
                        <h5>Direccion:</h5>
                    </div>
                    <div class="col-6">
                        <h5><?= $facturacion['Cabecera_Factura']['Calle_domicilio']." ". $facturacion['Cabecera_Factura']['Numero_domicilio']?></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h5>codigo Potal:</h5>
                    </div>
                    <div class="col-6">
                        <h5>
                            <?= $facturacion['Cabecera_Factura']['Codigo_postal_domicilio'] ?>
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h5>Email:</h5>
                    </div>
                    <div class="col-6">
                        <h5>
                            <?= $facturacion['Cabecera_Factura']['Correo_usuario'] ?>
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h5>Fecha:</h5>
                    </div>
                    <div class="col-6">
                        <h5>
                            <?= $facturacion['Cabecera_Factura']['Fecha_factura'] ?>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <table class="table table-borderless factura">
                <thead>
                    <tr>
                        <th>Cant.</th>
                        <th>Producto</th>
                        <th>Precio Unitario</th>
                        <th>Importe</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total=0; foreach ($facturacion['Detalle_Factura'] as $producto) { ?>
                        <tr>
                            <td><?= $producto['Cantidad_detalle']?></td>
                            <td><?= $producto['Nombre_producto']?></td>
                            <td>&dollar;<?= number_format($producto['Precio_producto'], 2,',','.') ?></td>
                            <td>&dollar;<?= number_format($producto['Cantidad_detalle']*$producto['Precio_producto'],2,',','.') ?></td>
                        </tr>
                    <?php $total+=$producto['Cantidad_detalle']*$producto['Precio_producto']; } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Sub Total</th>
                        <th></th>
                        <th>&dollar;<?= number_format($total,2,',','.') ?></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>Envio Estandar</th>
                        <th></th>
                        <th>&dollar;1.500,00</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>Total Factura</th>
                        <th></th>
                        <th>&dollar;<?= number_format($total + 1500, 2,',','.') ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="cond row">
            <div class="col-12 mt-3">
                <h4>Formas de pago</h4>
                <p>Metodo: <?= $facturacion['Cabecera_Factura']['Forma_pago_factura']?></p>
            </div>
        </div>
        <div class="row">
            <a class="btn btn-success col-4 ms-auto" href="/Acevedo_ignacio" >volver</a>
            <button class="btn btn-success col-4 ms-5" onclick="window.print()">Descargar Factura</button>
        </div>
    </div>
</body>

</html>