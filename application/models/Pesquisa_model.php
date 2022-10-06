<?php

class Pesquisa_model  extends CI_Model  {
    public $formulario_id;

    public function insert_preco($dados)
	{
		$this->db->insert('precos', $dados);
	}

    public function update_preco($dados)
	{
		$this->db->where('formulario_id', $dados['formulario_id'])
            ->where('item_id', $dados['item_id'])
            ->update('precos', $dados);
	}

    public function get_preco($formulario_id, $item_id)
	{
		return $this->db->get_where('precos', array(
            'formulario_id' => $formulario_id,
            'item_id' => $item_id
        ))->row();
	}

    public function get_itens($tipo)
	{
        $query = $this->db->select(
                'i.id, i.nome, i.unidade_medida, i.tipo, p.id as preco_id, p.preco,
                p.comercializa, p.marca, p.observacoes, p.uf, p.criado_em, p.atualizado_em, p.formulario_id'
            )
            ->join('precos p', 'p.item_id = i.id', 'right')
            ->order_by('ordem');

        $where = array('i.tipo' => $tipo);

        if (!empty($this->formulario_id)) {
            $where['p.formulario_id'] = $this->formulario_id;
        } else {
            $query = $query->group_by('i.id');
        }

		return $query->get_where('itens i', $where)->result();
	}

    public function get_ufs()
	{
		$query = $this->db->query("SELECT * FROM ufs");
		return $query->result();
	}

    public function get_formularios()
	{
		$query = $this->db->query("select * from formularios where tipo = 'empresa'");
		return $query->num_rows();
	}

    public function quantidade_formularios_respondidos()
    {
        return $this->db->get('formularios')->num_rows();
    }

    public function get_empresas()
    {
        return $this->db->select('e.nome as empresa, m.municipio, e.uf, f.id as formulario_id')
            ->join('formularios f', 'f.empresa_id = e.id')
            ->join('municipios m', 'e.municipio_id = m.id')
            // ->limit(5)
            ->get('empresas e');
    }

    public function get_itens_nome()
    {
        return $this->db->select('nome')->order_by('ordem')->get_where('itens', array('tipo' => 'empresa'));
    }

}
