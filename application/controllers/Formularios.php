<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH.'/traits/Timestamps.php';

class Formularios extends CI_Controller {
    use Timestamps;

    public $nome_tabela = 'formularios';
    public $itens;

    public function __construct()
	{
		parent::__construct();

		$this->load->library('grocery_CRUD');
		$this->load->model('Pesquisa_model');
	}

    public function index($empresa_id = '')
	{
		try{
			$crud = new grocery_CRUD();
            $crud->set_language('pt-br.portuguese');

			$crud->set_table('formularios');
            $crud->set_subject('Formulário');
            $crud->display_as('criado_em','Criado em');
            $crud->display_as('empresa_id','Empresa');
            $crud->unset_clone();

            $js_custom = '';
            $state = $crud->getState();
            $state_info = $crud->getStateInfo();

            if (!empty($state_info->primary_key)) {
                $this->Pesquisa_model->formulario_id = $state_info->primary_key;
            }

            if ($state == 'add') {
                $js_custom .= '<script>
                    $(\'select[name="publicado"] option[value="Não"]\').attr("selected", "selected");

                    $(\'.select-comercializa option[value="Não"]\').attr("selected", "selected");
                </script>';
            }

            if (!empty($empresa_id) && is_numeric($empresa_id)) {
                $crud->set_subject('formulário de empresa');

                $array_tipo = array(
                    'empresa' => 'Empresas'
                );

                $itens = $this->Pesquisa_model->get_itens('empresa');
                $crud->where('empresa_id', $empresa_id);
                $crud->set_relation('empresa_id', 'empresas', '{nome} / {uf}', array('id' => $empresa_id));

                $crud->columns('tipo','criado_em','publicado', 'empresa_id');
                $fields = array('tipo', 'publicado', 'empresa_id');

                $js_custom .= '
                    <script>
                        $(\'select[name="tipo"] option[value="empresa"]\').attr("selected", "selected");
                        $(\'select[name="empresa_id"] option[value="'.$empresa_id.'"]\').attr("selected", "selected");
                    </script>';
            } else {
                $crud->set_subject('formulário online');

                $array_tipo = array(
                    'online' => 'Online'
                );

                $ufs = [];
                foreach ($this->Pesquisa_model->get_ufs() as $uf) {
                    $ufs[$uf->sigla] = $uf->sigla;
                }

                $crud->where('empresa_id IS NULL', null, false);
                $crud->columns('tipo', 'criado_em', 'publicado');
                $fields = array('tipo', 'publicado');

                $itens = $this->Pesquisa_model->get_itens('online');

                $js_custom .= '<script>$(\'select[name="tipo"] option[value="online"]\').attr("selected", "selected");</script>';
            }

            $crud->field_type('tipo', 'dropdown', $array_tipo);
            $crud->field_type('publicado', 'dropdown', array('Sim' => 'Sim', 'Não' => 'Não'));

            $crud->callback_before_insert(array($this, 'action_retorna_dados_formulario'));
            $crud->callback_before_update(array($this, 'action_retorna_dados_formulario'));
            
            $crud->callback_after_insert(array($this, 'action_salva_precos'));
			$crud->callback_after_update(array($this, 'action_salva_precos'));

            foreach ($itens as $item) {
                $this->itens[$item->id] = $item;

                $fields[] = 'comercializa_'.$item->id;
                $fields[] = 'preco_'.$item->id;
                $fields[] = 'marca_'.$item->id;
                $fields[] = 'observacoes_'.$item->id;

                $crud->callback_field('comercializa_'.$item->id, array($this, 'items_select_callback'));
                $crud->callback_field('preco_'.$item->id, array($this, 'items_integer_callback'));
                $crud->callback_field('marca_'.$item->id, array($this, 'items_text_callback'));
                $crud->callback_field('observacoes_'.$item->id, array($this, 'items_text_callback'));

                $crud->display_as('comercializa_' . $item->id, 'Comercializa '. $item->nome. '?');
                $crud->display_as('preco_' . $item->id, 'Preço '. $item->nome);
                $crud->display_as('marca_' . $item->id, 'Marca '. $item->nome);
                $crud->display_as('observacoes_' . $item->id, 'Observações '. $item->nome);

                $crud->field_type('comercializa_' . $item->id, 'dropdown', array('Sim' => 'Sim', 'Não' => 'Não'));
                $crud->field_type('preco_' . $item->id, 'integer');

                if (isset($ufs)) {
                    $crud->callback_field('uf_'.$item->id, array($this, 'items_select_callback'));
                    $fields[] = 'uf_'.$item->id;
                    $crud->display_as('uf_' . $item->id, 'UF '. $item->nome);
                    $crud->field_type('uf_' . $item->id, 'dropdown', $ufs);
                }
            }

            $crud->fields($fields);

			$output = $crud->render();
            $output->{'js_custom'} = $js_custom;
			$this->_paginas_output($output);

		} catch(\Exception $error) {
			show_error($error->getMessage().' --- '.$error->getTraceAsString());
		}
	}

	public function _paginas_output($output = null)
	{
		$this->load->view('paginas', (array) $output);
	}

    public function items_integer_callback($value = '', $primary_key = null, $field_info)
	{
        [$item_name, $item_id] = explode('_', $field_info->name);

        $value = !empty($primary_key) ? $this->itens[$item_id]->$item_name : '0';

        return '<input id="field-'. $field_info->name .'" name="'. $field_info->name .'" type="text" value="'. $value .'" class="numeric form-control w-100" inputmode="text">';
	}

    public function items_text_callback($value = '', $primary_key = null, $field_info)
	{
        [$item_name, $item_id] = explode('_', $field_info->name);

        $value = !empty($primary_key) ? $this->itens[$item_id]->$item_name : '';

        return '<input id="field-'. $field_info->name .'" name="'. $field_info->name .'" type="text" value="'. $value .'" class="form-control w-100" inputmode="text">';
	}

    public function items_select_callback($value = '', $primary_key = null, $field_info)
	{
        [$item_name, $item_id] = explode('_', $field_info->name);

        $value = !empty($primary_key) ? $this->itens[$item_id]->$item_name : '';

        $select = '<select id="field-'. $field_info->name .'" name="'. $field_info->name .'" class="chosen-select select-'. $item_name .'"
        data-placeholder="Selecione"><option value=""></option>';
    
        foreach($field_info->extras as $valor => $texto) {
            $select .= '<option value="'.$valor.'"';
            $select .= $value == $valor ? ' selected' : '';
            $select .= '>'.$texto.'</option>';
        }

        $select .= '</select>';

        return $select;
	}

    public function action_retorna_dados_formulario($post_array, $primary_key = '')
	{
        return array(
            'tipo' => $post_array['tipo'],
            'publicado' => $post_array['publicado'],
            'empresa_id' => $post_array['empresa_id'] ?? null
        );
	}

    public function action_salva_precos($post_array, $primary_key = '')
	{
        $this->action_after_insert_update($post_array, $primary_key);

        $post = $this->input->post();
        unset($post['tipo']);
        unset($post['publicado']);
        unset($post['empresa_id']);

        $precos = [];

        foreach($post as $chave => $valor) {
            $campo = explode('_', $chave);

            if ($campo[0] == 'preco') {
                $valor = (float) str_replace(['.', ',', '_'], ['', '.', ''], $valor);
            }

            $precos['item_'.$campo[1]][$campo[0]] = $valor;
        }
        
        foreach($precos as $item => $preco) {
            $preco['formulario_id'] = (int) $primary_key;
            $preco['item_id'] = (int) str_replace('item_', '', $item);
            $preco['atualizado_em'] = date('Y-m-d H:i:s');

            $get_preco = $this->Pesquisa_model->get_preco($preco['formulario_id'], $preco['item_id']);

            if (!empty($get_preco)) {
                $this->Pesquisa_model->update_preco($preco);
            } else {
                $this->Pesquisa_model->insert_preco($preco);
            }
        }
	}
}
