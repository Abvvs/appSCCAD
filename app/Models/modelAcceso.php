<?php

namespace App\Models;

use CodeIgniter\Model;
use PDO;

class modelAcceso extends Model
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
}