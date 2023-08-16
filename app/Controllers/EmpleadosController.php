<?php

namespace App\Controllers;

class EmpleadosController extends BaseController
{
    protected $request, $session;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
    }

    public function vistaEmpleados()
    {
        if ($this->session->has('usuario')) {
            $datos = ['usuario' => $this->session->get('usuario')];
            $model = new \App\Models\modelEmpleados();
            $modelRoles = new \App\Models\modelRol();
            $roles = $modelRoles->selectRol();
            $empleados = $model->seleccionarEmpleados();
            $resp = ['empleados' => $empleados, 'roles' => $roles];
            return view('layouts/header') . view('layouts/aside', $datos) . view('modulos/empleados', $resp) . view('layouts/footer');
        }
        return view('usuarios/login', ["error" => "Usuario o contraseña incorrectos"]);
    }
    public function insertEmpleados()
    {
        //".$_POST['nombreEmp'].$_POST['apellidoEmp'].$_POST['direccionEmp'].$_POST['identificacionEmp'].$_POST['salarioEmp'].$_POST['rolEmp']."
        if (isset($_POST['nombreEmp']) && isset($_POST['apellidoEmp']) && isset($_POST['direccionEmp']) && isset($_POST['identificacionEmp']) && isset($_POST['salarioEmp']) && isset($_POST['rolEmp'])) {
            
            $nombre = $_POST['nombreEmp'];
            $apellido = $_POST['apellidoEmp'];
            $direccion = $_POST['direccionEmp'];
            $identificacion = $_POST['identificacionEmp'];
            $salario = $_POST['salarioEmp'];
            $rol = $_POST['rolEmp'];
            $model = new \App\Models\modelEmpleados();
            $validar = $model->validarDatos("", $nombre, $apellido, $direccion, $identificacion, $salario, $rol);                     
            if ($validar == 0) {
                echo "<script>alert('Ingrese datos válidos');
                window.location='empleados';
                </script>";
            } else if( $validar == 2){
                echo "<script>alert('Empleado ya se encuentra registrado');
                window.location='empleados'
                </script>";
            }else if($validar == 1 ){
                $consulta = $model->insertarEmpleado($nombre, $apellido, $direccion, $identificacion, $salario, $rol);
                echo "<script>alert('Empleado registrado exitosamente');
                window.location='empleados'
                </script>";
            }else{
                echo "<script>alert('Hubo un error, vuelva a intentar');
                window.location='empleados';
                </script>";
            }        
        } else {
            return 'Hubo un error, vuelva a intentar';
        }
    }
    public function deleteEmpleados()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $model = new \App\Models\modelEmpleados();
            $consulta = $model->eliminarEmpleados($id);
        } else {
            return 'Hubo un error, vuelva a intentar';
        }
    }
    public function editEmpleados()
    {
        if (isset($_POST['midEmp']) && isset($_POST['mnombreEmp']) && isset($_POST['mapellidoEmp']) && isset($_POST['mdireccionEmp']) && isset($_POST['midentificacionEmp']) && isset($_POST['msalarioEmp']) && isset($_POST['mrolEmp'])) {
            $id = $_POST['midEmp'];
            $nombre = $_POST['mnombreEmp'];
            $apellido = $_POST['mapellidoEmp'];
            $direccion = $_POST['mdireccionEmp'];
            $identificacion = $_POST['midentificacionEmp'];
            $salario = $_POST['msalarioEmp'];
            $rol = $_POST['mrolEmp'];
            $model = new \App\Models\modelEmpleados();
            $verificar = $model->validarDatos($id, $nombre, $apellido, $direccion, $identificacion, $salario, $rol);
            $validar = $model->validarDatos("", $nombre, $apellido, $direccion, $identificacion, $salario, $rol);
            $cambios = $model->verificarCambios($id,$identificacion);                  
            if ($validar == 0) {
                echo "<script>alert('Ingrese datos válidos');
                window.location='empleados';
                </script>";
            } else if( $cambios == 1){
                echo "<script>alert('Empleado ya se encuentra registrado');
                window.location='empleados';
                </script>";
            }else if($cambios == 0 || $cambios == 2){
                $consulta = $model->editarEmpleados($id,$nombre, $apellido, $direccion, $identificacion, $salario, $rol);
                echo "<script>alert('Empleado editado exitosamente');
                window.location='empleados'
                </script>";
            }
        } else {
            return 'Hubo un error, vuelva a intentar';
        }
    }
}