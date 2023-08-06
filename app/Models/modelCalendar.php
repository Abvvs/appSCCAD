<?php

namespace App\Models;

use CodeIgniter\Model;
use PDO;

class modelCalendar extends Model
{  
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function selectTrabajos()
    {
        $consulta = $this->db->table('tbl_trabajos t');
        $consulta->select('t.trb_id,t.trb_detalle,t.trb_fecha, t.trb_direccion, t.trb_telefono,t.trb_total, t.trb_propietario');
        $consulta->where('t.trb_estado', 1);
        $query = $consulta->get();
        $respuesta = $query->getResultArray();
        return $respuesta;
    }
}