<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\miModelo;

class TrabajosController extends BaseController
{
    protected $request, $session;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
    }
    public function vistaTrabajos()
    {
        if ($this->session->has('usuario')){
            $datos = ['usuario' => $this->session->get('usuario')];
            $model = new \App\Models\modelTrabajos();
            $modelEmpleados = new \App\Models\modelEmpleados();
            $modelEmpTrb = new \App\Models\modelEmpTrb();
            $empleados = $modelEmpleados->seleccionarEmpleados();
            $trabajos = $model->seleccionarTrabajos();
            $responsables = $modelEmpTrb->seleccionarEmpTrb();
            $resp = ['trabajos' => $trabajos, 'empleados' => $empleados, 'responsables'=>$responsables];
            return view('layouts/header') . view('layouts/aside', $datos) . view('modulos/trabajos', $resp) . view('layouts/footer');
        }
        return view('usuarios/login', ["error" => "Usuario o contraseña incorrectos"]);     
    }
    public function insertTrabajos(){
        if (isset($_POST['propietarioTrb']) && isset($_POST['detalleTrb']) && isset($_POST['direccionTrb']) && isset($_POST['fechaTrb'])&& isset($_POST['telefonoTrb'])&& isset($_POST['totalTrb']) && isset($_POST['empleados'])) {
            $propietario = $_POST['propietarioTrb'];
            $detalle = $_POST['detalleTrb'];
            $direccion = $_POST['direccionTrb'];
            $fecha = $_POST['fechaTrb'];
            $telefono = $_POST['telefonoTrb'];
            $total = $_POST['totalTrb'];
            $empleados =  $_POST['empleados'];
            $model = new \App\Models\modelTrabajos();
            $modelEmpTrb = new \App\Models\modelEmpTrb();
            $validar = $model->validarDatos($detalle, $fecha, $direccion, $telefono, $total, $propietario);
            if($validar == true){
                $consulta = $model->insertarTrabajo($detalle, $fecha, $direccion, $telefono, $total, $propietario);   
                $ultimo = $model ->ultimoTrabajo();
                $consulta2 = $modelEmpTrb->insertarEmpTrb($ultimo[0]['trb_id'], $empleados);
            }
            return redirect()->back(); 
        } else {
            return 'Hubo un error, vuelva a intentar';
        }
    }
    public function editTrabajos()
    {
        if (isset($_POST['midTrb']) && isset($_POST['mpropietarioTrb']) && isset($_POST['mdetalleTrb'])&& isset($_POST['mdireccionTrb']) && isset($_POST['mfechaTrb'])&& isset($_POST['mtelefonoTrb']) && isset($_POST['mfechaTrb'])&& isset($_POST['mtotalTrb']) && $_POST['mempleados']) {
            $id = $_POST['midTrb'];
            $propietario = $_POST['mpropietarioTrb'];
            $detalle = $_POST['mdetalleTrb'];
            $direccion = $_POST['mdireccionTrb'];
            $fecha = $_POST['mfechaTrb'];
            $telefono = $_POST['mtelefonoTrb'];
            $total = $_POST['mtotalTrb'];
            $empleados = $_POST['mempleados'];
            $model = new \App\Models\modelTrabajos();
            $modelEmpTrb = new \App\Models\modelEmpTrb();
            $validar = $model->validarDatos($detalle, $fecha, $direccion, $telefono, $total, $propietario);
            if($validar == true){
                $consulta = $model->editarTrabajos($id,$detalle, $fecha, $direccion, $telefono, $total, $propietario);  
                $listaEmpleados = $modelEmpTrb ->listaResponsables($id);
                $deleteLista = $modelEmpTrb ->eliminarResponsables($id, $listaEmpleados);
                $consulta2 = $modelEmpTrb->insertarEmpTrb($id, $empleados); 
            }
            return redirect()->back();

        } else {
            return 'Hubo un error, vuelva a intentar';
        }     
    }
    public function deleteTrabajos()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $model = new \App\Models\modelTrabajos();
            $consulta = $model->eliminarTrabajos($id);
        } else {
            return 'Hubo un error, vuelva a intentar';
        }     
    }
    //generar codigo
    
}