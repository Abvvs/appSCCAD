<?php

namespace App\Models;

use CodeIgniter\Model;
use PDO;

class modelRol extends Model
{  
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function selectRol()
    {
        $consulta = $this->db->table('tbl_roles r');
        $consulta->select('r.rol_id,r.rol_nombre');
        $consulta->where('r.rol_estado', 1);
        $query = $consulta->get();
        $respuesta = $query->getResultArray();
        return $respuesta;
    }
}