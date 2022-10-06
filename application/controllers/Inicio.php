<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Pesquisa_model');
	}

	public function index()
	{
		$this->load->model('Pesquisa_model');
		
		$formularios = $this->Pesquisa_model->quantidade_formularios_respondidos();

		$this->load->view('inicio', compact('formularios'));
	}
}
