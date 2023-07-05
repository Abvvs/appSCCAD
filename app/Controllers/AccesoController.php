<?php

namespace App\Controllers;

class AccesoController extends BaseController
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
             
            require_once(APPPATH.'Controllers\EmpleadosController.php'); //cambiar en caso de subir a algun host
            $oEmpleadosController =  new EmpleadosController();
            return $oEmpleadosController->vistaEmpleados();
        } else {
            $datos = array();
            if (isset($_POST['username']) && isset($_POST['pass'])) {
                $datos["USUARIO"] = $_POST['username'];
                $datos["PASSWORD"] = $_POST['pass'];
            } else
                return $this->login();
            $model = new \App\Models\modelAcceso();
            $resp = $model->login($datos);
            if ($resp != NULL) {
                $usuario = [
                    $resp[0]['us_id'], $resp[0]['us_usuario']
                ];
                
                $datos = ['usuario' => $usuario];
                $this->session->set($datos);
                require_once(APPPATH.'Controllers\EmpleadosController.php');
                $oEmpleadosController =  new EmpleadosController();
                return $oEmpleadosController->vistaEmpleados();
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
}