<?php

namespace App\Models;

use CodeIgniter\Model;


class ConsultasModel extends Model
{
    protected $table = 'consulta';
    protected $primaryKey = 'Id_consulta';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['Asunto_consulta', 'Mensaje_consulta', 'Visto_consulta', 'Id_usuario','Nombre_consulta','Apellido_consulta','Correo_consulta'];
}