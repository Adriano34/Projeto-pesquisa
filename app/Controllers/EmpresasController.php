<?php
namespace App\Controllers;

class EmpresasController extends Controller
{
    public function index()
    {
        $this->view('lista-empresas');
    }

    public function criar()
    {
        $this->view('criar-empresa');
    }

    // Criar aqui uma nova action criar() e chamar uma view que tenha o form de cadastro
}
