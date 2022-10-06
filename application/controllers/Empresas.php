<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH.'/traits/Timestamps.php';

class Empresas extends CI_Controller {
	use Timestamps;

	public $nome_tabela = 'empresas';
	public $header = array();

    public function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
	}

    public function index()
	{
		try {
			$crud = new grocery_CRUD();
            $crud->set_language('pt-br.portuguese');

			$crud->set_table('empresas');
			$crud->set_subject('Empresas');

			$crud->set_relation('uf', 'ufs', 'sigla');
			$crud->set_relation('municipio_id','municipios','{municipio}/{uf}');

			$crud->columns('nome','telefone','site', 'uf', 'municipio_id');
			$crud->fields('nome','telefone','site', 'uf', 'municipio_id');

			$crud->display_as('uf','UF');
			$crud->display_as('municipio_id','Município');
			$crud->display_as('criado_em','Criado em');
			$crud->display_as('atualizado_em','Atualizado em');

			$crud->callback_after_insert(array($this, 'action_after_insert_update'));
			$crud->callback_after_update(array($this, 'action_after_insert_update'));

			$crud->unset_clone();
			
			$crud->add_action(
				'Formulários',
				'/assets/grocery_crud/themes/flexigrid/css/images/clone.png',
				'/formularios/index',
				'',
				array($this, 'action_listar_formularios')
			);

			$crud->add_action(
				'Novo formulário',
				'/assets/grocery_crud/themes/flexigrid/css/images/add.png',
				'/formularios/index',
				'',
				array($this, 'action_novo_formulario')
			);

			$fields = array(
				'uf' => array(
					'table_name' => 'ufs',
					'title' => 'sigla',
					'relate' => null,
				),
				'municipio_id' => array(
					'table_name' => 'municipios',
					'title' => 'municipio',
					'id_field' => 'id',
					'relate' => 'uf',
					'data-placeholder' => 'Selecione o município'
				)
			);

			$config = array(
				'main_table' => 'empresas',
				'main_table_primary' => 'id',
				"url" => base_url() . __CLASS__ . '/' . __FUNCTION__ . '/'
			);

			$this->load->library('Gc_dependent_select');
			$dependencias = new gc_dependent_select($crud, $fields, $config);
			
			$output = $crud->render();
			$output->{'js_custom'} = $dependencias->get_js();

			$this->_paginas_output($output);
		} catch(\Exception $error) {
			show_error($error->getMessage().' --- '.$error->getTraceAsString());
		}
	}

	public function _paginas_output($output = null)
	{
		$this->load->view('paginas', (array) $output);
	}

	public function action_listar_formularios($primary_key, $row)
	{
		return base_url('/formularios/index/') . $primary_key;
	}
	
	public function action_novo_formulario($primary_key, $row)
	{
		return base_url('/formularios/index/' . $primary_key . '/add');
	}

	public function exportar_dados_completos() {
		$this->load->model('Pesquisa_model');

		$itens_nome = $this->Pesquisa_model->get_itens_nome()->result();

		foreach ($itens_nome as $item) {
			$this->header[] = 'comercializa '. $item->nome;
			$this->header[] = 'preço '. $item->nome;
			$this->header[] = 'observações '. $item->nome;
		}

		$empresas = $this->Pesquisa_model->get_empresas()->result();

		$empresas = array_map(
			function($empresa) {
				$this->Pesquisa_model->formulario_id = $empresa->formulario_id;
				$itens = $this->Pesquisa_model->get_itens('empresa');

				foreach ($this->header as $header) {
					$empresa->{$header} = '';
				}

				foreach ($itens as $item) {
					$empresa->{'comercializa '. $item->nome} = $item->comercializa;
					$empresa->{'preço '. $item->nome} = number_format($item->preco, 2, ',', '.');
					$empresa->{'observações '. $item->nome} = $item->observacoes;
				}

				unset($empresa->formulario_id);

				return $empresa;
			},
			(array) $empresas
		);

		$header = array_merge(array('empresa', 'municipio', 'uf'), $this->header);

		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=Exportação de dados completos das empresas.xls");

		$this->load->view('exportar_dados_completos', compact('empresas', 'header'));
	}
}
