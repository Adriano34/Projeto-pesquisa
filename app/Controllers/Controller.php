<?php
namespace App\Controllers;

class Controller
{
    public function view($pagina)
    {
        require_once __DIR__ . '/../Views/'. $pagina .'.php';
    }
}
