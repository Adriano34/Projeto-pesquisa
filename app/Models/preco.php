<?php

namespace App\Models;

class Preco {
    private $id;
    private $preco;
    private $comercializa;
    private $uf;
    private $criado_em;
    private $atualizado_em;
    private $formulario;
    private $item_id;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getPreco() {
        return $this->preco;
    }
    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function getComercializa() {
        return $this->comercializa;
    }
    public function setComercializa($comercializa) {
        $this->comercializa = $comercializa;
    }

    public function getUf() {
        return $this->uf;
    }
    public function setUf($uf) {
        $this->uf = $uf;
    }

    public function getCriadoEm() {
        return $this->criado_em;
    }
    public function setCriadoEm($criado_em) {
        $this->criado_em = $criado_em;
    }

    public function getAtualizadoEm() {
        return $this->atualizado_em;
    }
    public function setAtualizadoEm($atualizado_em) {
        $this->atualizado_em = $atualizado_em;
    }

    public function getFormularioId() {
        return $this->formulario_id;
    }
    public function setFormularioId($formulario_id) {
        $this->formulario_id = $formulario_id;
    }

    public function getItemId() {
        return $this->item_id;
    }
    public function setItemId($item_id) {
        $this->item_id = $item_id;
    }
}

