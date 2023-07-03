<?php

namespace App\Models;

use CodeIgniter\Model;
use PDO;

class modelTrabajos extends Model
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

    public function insertarTrabajo($detalle, $fecha, $direccion, $telefono, $total, $propietario)
    {
        $consulta = $this->db->table('tbl_trabajos');
        $resp = [
            'trb_detalle' => $detalle,
            'trb_fecha' => $fecha,
            'trb_direccion' => $direccion,
            'trb_telefono' => $telefono,
            'trb_total' => $total,
            'trb_propietario' => $propietario,
            'trb_estado' => 1,
        ];
        $consulta -> insert($resp);
        return 'Registro exitoso';
    }
    public function deleteTrabajos($id)
    {
        $consulta = $this->db->table('tbl_trabajos t');
        $consulta->where('t.trb_id', $id);
        $resp = [
            'trb_estado' => 0
        ];
        $consulta->update($resp);
        return  'Eliminado correctamente';
    }
    public function editTrabajos($id,$detalle, $fecha, $direccion, $telefono, $total, $propietario)
    {
        $consulta = $this->db->table('tbl_trabajos t');
        $consulta->where('t.trb_id', $id);
        $resp = [
            'trb_detalle' => $detalle,
            'trb_fecha' => $fecha,
            'trb_direccion' => $direccion,
            'trb_telefono' => $telefono,
            'trb_total' => $total,
            'trb_propietario' => $propietario,
            'trb_estado' => 1,
        ];
        $consulta->update($resp);
        
        return  'Se han guardado los cambios';
    }
    public function ultimoTrabajo(){
        $consulta = $this->db->table('tbl_trabajos t');
        $consulta->where('t.trb_estado', 1);
        $consulta->limit(1);
        $consulta->orderBy('t.trb_id', 'DESC');
        $query = $consulta->get();
        $respuesta = $query->getResultArray();
        return $respuesta;
    }
    
}