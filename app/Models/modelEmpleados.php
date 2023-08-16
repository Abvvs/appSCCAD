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
            'tbl_roles_rol_id' => $rol,
            'emp_estado' => 1
        ];
        $consulta->insert($resp);
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
        return 'Eliminado correctamente';
    }
    public function editarEmpleados($id, $nombre, $apellido, $direccion, $identificacion, $salario, $rol)
    {
        $consulta = $this->db->table('tbl_empleados e');
        $consulta->where('e.emp_id', $id);
        $resp = [
            'emp_nombre' => $nombre,
            'emp_apellido' => $apellido,
            'emp_direccion' => $direccion,
            'emp_identificacion' => $identificacion,
            'emp_salario' => $salario,
            'tbl_roles_rol_id' => $rol,
            'emp_estado' => 1
        ];
        $consulta->update($resp);

        return 'Se han guardado los cambios';
    }
    public function verificarEmpleado($identificacion)
    {
        $consulta = $this->db->table('tbl_empleados e');
        $consulta->where('e.emp_identificacion', $identificacion);
        $consulta->where('e.emp_estado', 1);
        $query = $consulta->get();
        $respuesta = $query->getResultArray();
        if (empty($respuesta)) {
            return 0; //false -> no se encontro nada
        } else {
            return 1; //true -> se encontro empleado
        }
    }

    public function validarDatos($id, $nombre, $apellido, $direccion, $identificacion, $salario, $rol)
    {
        $regex = '/^[a-zA-ZáéíóúüñÁÉÍÓÚÜÑ\s]{3,45}$/u';
        $regexDir = '/^.{3,100}$/u';
        //'/^[\p{L}\s]{3,100}$/u'
        $regexIden = '/^[0-9]{10}$/';
        $regexSalario = '/^[0-9.]{1,6}$/';
        $estado = 0;

        if ($nombre != "" && $apellido != "" && $direccion != "" && $identificacion != "" && $salario != "" && $rol != "0") {
            //echo '<script>alert('.strlen($nombre).');</script>';
            
            // CAMBIAR SALARIO TYPE NUMBER
            //CAMBIAR IDENTIFICACION SOLO 10 NUMEROS
            //echo '<script>alert('.strlen($identificacion).' '.$identificacion.');</script>';
            if (preg_match($regex, $nombre) && preg_match($regex, $apellido) && preg_match($regexDir, $direccion) && preg_match($regexIden, $identificacion) && preg_match($regexSalario, $salario)) {
                $estado = 1;

                if ($this->verificarEmpleado($identificacion) == 1) {
                    $estado = 2; //false -> no se puede ingresar, ya existe
                } else {

                    $estado = 1; //true -> se puede ingresar
                }
            } else {
                $estado = 0;
            }

        } else {
            $estado = 0; //false
        }
        return $estado;

    }
    function verificarCambios($id,$identificacion){
        $consulta = $this->db->table('tbl_empleados e');
        $consulta->select('e.emp_id,e.emp_nombre,e.emp_apellido, e.emp_direccion, e.emp_identificacion,e.emp_salario');
        $consulta->where('e.emp_id', $id);
        $query = $consulta->get();
        $respuesta = $query->getResultArray();
        $antigua = $respuesta[0]['emp_identificacion'];
        if($antigua == $identificacion){
            return 2; //Se puede editar
        }else{
            return $this->verificarEmpleado($identificacion); 
            //Verificar si existe la identificacion
            //0 se puede editar
            //1 no se puede editar
        }
    }

}