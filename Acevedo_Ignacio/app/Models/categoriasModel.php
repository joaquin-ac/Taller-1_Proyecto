<?php

namespace App\Models;

use CodeIgniter\Model;


class CategoriasModel extends Model
{
    protected $table = 'categoria';
    protected $primaryKey = 'Id_categoria';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['Nombre_categoria', 'Activo_categoria'];
}