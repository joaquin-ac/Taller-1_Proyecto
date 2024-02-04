<?php

namespace App\Models;

use CodeIgniter\Model;


class FacturasModel extends Model
{
    protected $table = 'factura';
    protected $primaryKey = 'Id_factura';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['Importe_total_factura', 'Id_usuario', 'Id_domicilio','Forma_pago_factura','Fecha_factura'];
}