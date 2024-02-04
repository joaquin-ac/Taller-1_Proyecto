<?php

namespace App\Models;

use CodeIgniter\Model;


class RolModel extends Model
{
    protected $table = 'rol';
    protected $primaryKey = 'Id_rol';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['Nombre_rol'];
}