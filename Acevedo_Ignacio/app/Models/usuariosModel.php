<?php

namespace App\Models;

use CodeIgniter\Model;


class usuariosModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'Id_usuario';
    protected $useAutoIncrement = true;
    //protected $returnType = 'array';
    protected $allowedFields = ['Dni_usuario' ,'Nombre_usuario', 'Apellido_usuario', 'Telefono_usuario', 'Activo_usuario', 'Password_usuario', 'Correo_usuario', 'Id_domicilio', 'Id_rol'];
}