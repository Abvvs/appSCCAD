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

    public function seleccionarTrabajos()
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
    public function eliminarTrabajos($id)
    {
        $consulta = $this->db->table('tbl_trabajos t');
        $consulta->where('t.trb_id', $id);
        $resp = [
            'trb_estado' => 0
        ];
        $consulta->update($resp);
        return  'Eliminado correctamente';
    }
    public function editarTrabajos($id,$detalle, $fecha, $direccion, $telefono, $total, $propietario)
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
    public function validarDatos($detalle, $fecha, $direccion, $telefono, $total, $propietario, $empleados){

        $regex = '/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ\s]{3,45}$/u';
        $regexDir = '/^.{3,100}$/u';
        //'/^[\p{L}\s]{3,100}$/u'
        $regexTel = '/^[0-9]{10}$/';
        $regexSalario = '/^[0-9.]{1,6}$/';
        $estado = 0;
        //var_dump($empleados[0]);
        if ($detalle != "" && $fecha != "" && $direccion != "" && $telefono != "" && $total != "" && $propietario != "" && $empleados[0] !="0") {
            //echo '<script>alert('.strlen($nombre).');</script>';
            
            // CAMBIAR SALARIO TYPE NUMBER
            //CAMBIAR IDENTIFICACION SOLO 10 NUMEROS
            //echo '<script>alert('.strlen($identificacion).' '.$identificacion.');</script>';
            if (preg_match($regex, $propietario) && preg_match($regexDir, $detalle) && preg_match($regexDir, $direccion) && preg_match($regexTel, $telefono) && preg_match($regexSalario, $total)) {
                $estado = 1; //true -> se puede ingresar
            } else {
                $estado = 0;
            }

        } else {
            $estado = 0; //false
        }
        return $estado;
    }

    
    
}