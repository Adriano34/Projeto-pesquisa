<?php
namespace App\Controllers;

class EmpresasController {

    public function index()
    {
        require_once __DIR__ . '/../Views/lista-empresas.php';
    }
}
