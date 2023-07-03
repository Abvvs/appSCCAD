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
    public function index()
    {
       
        if ($this->session->has('usuario')) {
            $datos = ['usuario' => $this->session->get('usuario')];
            return view('layouts/header') . view('layouts/aside', $datos) . view('modulos/inicio', $datos) . view('layouts/footer');
        } else {
            $datos = array();
            if (isset($_POST['username']) && isset($_POST['pass'])) {
                $datos["USUARIO"] = $_POST['username'];
                $datos["PASSWORD"] = $_POST['pass'];
            } else
                return $this->login();
            $model = new \App\Models\modelEmpleados();
            $resp = $model->login($datos);
            if ($resp != NULL) {
                $usuario = [
                    $resp[0]['us_id'], $resp[0]['us_usuario']
                ];
                
                $datos = ['usuario' => $usuario];
                $this->session->set($datos);
                return view('layouts/header') . view('layouts/aside', $datos) . view('modulos/inicio', $datos) . view('layouts/footer');
            }
            return view('usuarios/login', ["error" => "Usuario o contraseña incorrectos"]);
        }
    }

    public function login()
    {
        if ($this->session->has('usuario'))
            return $this->index();
        else
            return view('usuarios/login', ["error",]);
    }

    public function cerrarSesion()
    {
        $this->session->destroy();
        return view('usuarios/login');
    }
    public function empleados()
    {
        if ($this->session->has('usuario')){
            $datos = ['usuario' => $this->session->get('usuario')];
            $model = new \App\Models\modelEmpleados();
            $modelRoles = new \App\Models\modelRol();
            $roles = $modelRoles->selectRol();
            $empleados = $model->selectEmpleados();
            $resp = ['empleados' => $empleados, 'roles'=>$roles];
            return view('layouts/header') . view('layouts/aside', $datos) . view('modulos/empleados', $resp) . view('layouts/footer');
        }
        return view('usuarios/login', ["error" => "Usuario o contraseña incorrectos"]);     
    }
    public function insertE()
    {
        if (isset($_POST['nombreEmp']) && isset($_POST['apellidoEmp'])&& isset($_POST['direccionEmp']) && isset($_POST['identificacionEmp'])&& isset($_POST['salarioEmp']) && isset($_POST['rolEmp'])) {
            $nombre = $_POST['nombreEmp'];
            $apellido = $_POST['apellidoEmp'];
            $direccion = $_POST['direccionEmp'];
            $identificacion = $_POST['identificacionEmp'];
            $salario = $_POST['salarioEmp'];
            $rol = $_POST['rolEmp'];
            $model = new \App\Models\modelEmpleados();
            $consulta = $model->insertarEmpleado($nombre, $apellido, $direccion, $identificacion, $salario, $rol);        
            return redirect()->back();
        } else {
            return 'Hubo un error, vuelva a intentar';
        }     
    }
    public function deleteE()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $model = new \App\Models\modelEmpleados();
            $consulta = $model->deleteEmpleados($id);
        } else {
            return 'Hubo un error, vuelva a intentar';
        }     
    }
    public function editE()
    {
        if (isset($_POST['midEmp']) && isset($_POST['mnombreEmp']) && isset($_POST['mapellidoEmp'])&& isset($_POST['mdireccionEmp']) && isset($_POST['midentificacionEmp'])&& isset($_POST['msalarioEmp']) && isset($_POST['mrolEmp'])) {
            $id = $_POST['midEmp'];
            $nombre = $_POST['mnombreEmp'];
            $apellido = $_POST['mapellidoEmp'];
            $direccion = $_POST['mdireccionEmp'];
            $identificacion = $_POST['midentificacionEmp'];
            $salario = $_POST['msalarioEmp'];
            $rol = $_POST['mrolEmp'];
            $model = new \App\Models\modelEmpleados();
            $consulta = $model->editEmpleados($id,$nombre, $apellido, $direccion, $identificacion, $salario, $rol);            
            return redirect()->back();

        } else {
            return 'Hubo un error, vuelva a intentar';
        }     
    }
}
