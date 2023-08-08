<?php

namespace App\Models;

use CodeIgniter\Model;
use PDO;

class modelEmpleados extends Model
{  
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function insertarEmpleado($nombre, $apellido, $direccion, $identificacion, $salario, $rol)
    {
        $consulta = $this->db->table('tbl_empleados');
        $resp = [
            'emp_nombre' => $nombre,
            'emp_apellido' => $apellido,
            'emp_direccion' => $direccion,
            'emp_identificacion' => $identificacion,
            'emp_salario' => $salario,
            'tbl_roles_rol_id'=>$rol,
            'emp_estado' => 1
        ];
        $consulta -> insert($resp);
        return 'Registro exitoso';
    }

    public function seleccionarEmpleados()
    {
        $consulta = $this->db->table('tbl_empleados e');
        $consulta->select('e.emp_id,e.emp_nombre,e.emp_apellido, e.emp_direccion, e.emp_identificacion,e.emp_salario, r.rol_id, r.rol_nombre');
        $consulta->join('tbl_roles r', 'r.rol_id=e.tbl_roles_rol_id');
        $consulta->where('e.emp_estado', 1);
        $query = $consulta->get();
        $respuesta = $query->getResultArray();
        return $respuesta;
    }
    public function eliminarEmpleados($id)
    {
        $consulta = $this->db->table('tbl_empleados e');
        $consulta->where('e.emp_id', $id);
        $resp = [
            'emp_estado' => 0
        ];
        $consulta->update($resp);
        return  'Eliminado correctamente';
    }
    public function editarEmpleados($id,$nombre, $apellido, $direccion, $identificacion, $salario, $rol)
    {
        $consulta = $this->db->table('tbl_empleados e');
        $consulta->where('e.emp_id', $id);
        $resp = [
            'emp_nombre' => $nombre,
            'emp_apellido' => $apellido,
            'emp_direccion' => $direccion,
            'emp_identificacion' => $identificacion,
            'emp_salario' => $salario,
            'tbl_roles_rol_id'=>$rol,
            'emp_estado' => 1
        ];
        $consulta->update($resp);
        
        return  'Se han guardado los cambios';
    }
    public function verificarEmpleado($identificacion){
        $consulta = $this->db->table('tbl_empleados e');
        $consulta->where('e.emp_identificacion', $identificacion);
        $consulta->where('e.emp_estado', 1);
        $query = $consulta->get();
        $respuesta = $query->getResultArray();
        if(empty($respuesta)){
            return 0; //false -> no se encontro nada
        }else{
            return 1; //true -> se encontro empleado
        }
    }

    public function validarDatos($id,$nombre, $apellido, $direccion, $identificacion, $salario, $rol){
        if($nombre != "" && $apellido != "" && $direccion != "" && $identificacion != "" && $salario != "" && $rol!= "0"){
            if(is_numeric($identificacion)){
                if(strlen($identificacion)<10){
                    return 0; // false -> no se puede
                }else{
                    if($this->verificarEmpleado($identificacion)==1){
                        return 2;  //false -> no se puede ingresar, ya existe

                    }else{

                        return 1;  //true -> se puede ingresar
                    }
                }
            }else {
                return 0;   //false -> no se puede
            }
            
        }else{
            return 0;   //false
        }
    }
    
}