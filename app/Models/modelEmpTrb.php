<?php

namespace App\Models;

use CodeIgniter\Model;
use PDO;

class modelEmpTrb extends Model
{  
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function insertarEmpTrb($trabajo, $empleados)
    {
        if(count($empleados)>0){
            $consulta = $this->db->table('tbl_emp_trb et');
            for ($i=0; $i < count($empleados); $i++) { 
                $resp = [
                    'tbl_empleados_emp_id' => $empleados[$i],
                    'tbl_trabajos_trb_id' => $trabajo,
                    'etr_estado' => 1,
                ];
                $consulta -> insert($resp);
            }
            return 'Se ha ingresado exitosamente';
        }else{
            return 'Hubo un error, bueno, quiza varios pero eso usted no sabe gg';
        }   
    }

    public function seleccionarEmpTrb()
    {
        $consulta = $this->db->table('tbl_emp_trb et');
        $consulta->select('et.etr_id ,et.tbl_empleados_emp_id,et.tbl_trabajos_trb_id, e.emp_id, e.emp_nombre, e.emp_apellido,  ');
        $consulta->join('tbl_empleados e', 'et.tbl_empleados_emp_id=e.emp_id');
        $consulta->join('tbl_trabajos t', 'et.tbl_trabajos_trb_id=t.trb_id');
        $consulta->where('et.etr_estado', 1);
        $query = $consulta->get();
        $respuesta = $query->getResultArray();
        return $respuesta;
    }
    public function listaResponsables($idTrabajo)
    {
        $consulta = $this->db->table('tbl_emp_trb et');
        $consulta->select('et.etr_id ,et.tbl_empleados_emp_id,et.tbl_trabajos_trb_id');
        $consulta->where('et.tbl_trabajos_trb_id', $idTrabajo);
        $consulta->where('et.etr_estado', 1);
        $query = $consulta->get();
        $respuesta = $query->getResultArray();
        return $respuesta;
    }
    public function eliminarResponsables($trabajo, $empleados)
    {
        if(count($empleados)>0){
            $consulta = $this->db->table('tbl_emp_trb et');
            $consulta->where('et.tbl_trabajos_trb_id', $trabajo);
            $resp = [
                'etr_estado' => 0,
            ];
            $consulta -> update($resp);
            return 'Se ha eliminado exitosamente';
        }else{
            return 'Hubo un error, bueno, quiza varios pero eso usted no sabe gg';
        } 
    }
}