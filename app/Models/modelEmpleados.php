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

    public function login($user)
    {
        $consulta = $this->db->table('tbl_usuarios u');
        $consulta->select('u.us_id,u.us_estado ,u.us_usuario, u.us_password');
        $consulta->where('u.us_usuario', $user['USUARIO']);
        $consulta->where('u.us_password', $user['PASSWORD']);
        $query = $consulta->get();
        $respuesta = $query->getResultArray();
        return $respuesta;
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

    public function selectEmpleados()
    {
        $consulta = $this->db->table('tbl_empleados e');
        $consulta->select('e.emp_id,e.emp_nombre,e.emp_apellido, e.emp_direccion, e.emp_identificacion,e.emp_salario, r.rol_id, r.rol_nombre');
        $consulta->join('tbl_roles r', 'r.rol_id=e.tbl_roles_rol_id');
        $consulta->where('e.emp_estado', 1);
        $query = $consulta->get();
        $respuesta = $query->getResultArray();
        return $respuesta;
    }
    public function deleteEmpleados($id)
    {
        $consulta = $this->db->table('tbl_empleados e');
        $consulta->where('e.emp_id', $id);
        $resp = [
            'emp_estado' => 0
        ];
        $consulta->update($resp);
        return  'Eliminado correctamente';
    }
    public function editEmpleados($id,$nombre, $apellido, $direccion, $identificacion, $salario, $rol)
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
}