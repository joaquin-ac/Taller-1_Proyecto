<?php

namespace App\Models;

use CodeIgniter\Model;


class DomicilioModel extends Model
{
    protected $table = 'domicilio';
    protected $primaryKey = 'Id_domicilio';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['Calle_domicilio', 'Numero_domicilio', 'Codigo_postal_domicilio', 'Localidad_domicilio','Provincia_domicilio','Pais_domicilio'];
}