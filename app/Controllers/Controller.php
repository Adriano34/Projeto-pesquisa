<?php
namespace App\Controllers;

class Controller
{
    public function view($pagina, $dados = [])
    {
        extract($dados);
        require_once __DIR__ . '/../Views/'. $pagina .'.php';
    }
}
