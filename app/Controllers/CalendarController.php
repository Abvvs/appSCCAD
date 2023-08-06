<?php

namespace App\Controllers;

class CalendarController extends BaseController
{
    protected $request, $session;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
    }
    
    public function vistaCalendario()
    {
        return view('modulos/calendar');
    }
    public function vistaCalendario2()
    {
        $datos = ['usuario' => $this->session->get('usuario')];
        $model = new \App\Models\modelCalendar();
        $trabajos = $model->selectTrabajos();
        $resp = ['trabajos' => $trabajos];
        return view('layouts/header') . view('layouts/aside', $datos). view('modulos/calendar2',$resp) . view('layouts/footer');
    }
}