<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Itens extends CI_Controller {

    public function __construct()
	{
		parent::__construct();

		$this->load->library('grocery_CRUD');
	}

    public function index()
	{
		try{
			$crud = new grocery_CRUD();

			$crud->set_table('itens');
			$crud->set_subject('Itens');
			$crud->columns('nome','unidade_medida','tipo');
            $crud->display_as('descricao','Descrição');

            $crud->unset_texteditor('descricao');

            $crud->field_type('tipo', 'dropdown',
                array(
                    'empresa' => 'Empresas',
                    'online' => 'Online'
                )
            );

            $crud->set_language('pt-br.portuguese');
			$output = $crud->render();

			$this->_paginas_output($output);

		} catch(\Exception $error) {
			show_error($error->getMessage().' --- '.$error->getTraceAsString());
		}
	}

	public function _paginas_output($output = null)
	{
		$this->load->view('paginas', (array) $output);
	}
}
