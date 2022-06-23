<?php
namespace App\Controllers;

class ItensController extends Controller
{
    public function index()
    {
        $this->view('lista-itens');
    }

    public function criar()
    {
        $this->view('criar-item');
    }

    // Criar aqui uma nova action criar() e chamar uma view que tenha o form de cadastro
}
