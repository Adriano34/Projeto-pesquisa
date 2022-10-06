<?php

date_default_timezone_set('America/Sao_Paulo');

trait Timestamps {
    public function action_after_insert_update($post_array, $primary_key)
	{
		$dados = array(
			'atualizado_em' => date('Y-m-d H:i:s')
		);

		$this->db->where('id', $primary_key);
		$this->db->update($this->nome_tabela, $dados);
	 
		return true;
	}
}
