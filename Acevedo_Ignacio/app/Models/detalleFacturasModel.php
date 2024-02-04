<?php

namespace App\Models;

use CodeIgniter\Model;


class DetalleFacturasModel extends Model
{
    protected $table = 'detallefactura';
    protected $primaryKey = 'Id_detalle_factura';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['Cantidad_detalle', 'Subtotal_detalle', 'Id_factura', 'Id_producto'];
}