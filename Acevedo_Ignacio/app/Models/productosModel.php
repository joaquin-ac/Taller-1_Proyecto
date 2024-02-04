<?php

namespace App\Models;

use CodeIgniter\Model;


class ProductosModel extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'Id_producto';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['Nombre_producto', 'Descripcion_producto', 'Precio_producto', 'Cantidad_producto', 'url_imagen_producto', 'Activo_producto','Descuento_producto','Id_categoria'];
}