<?php

namespace App\Models;

class Item {
    private $id;
    private $nome;
    private $descricao;
    private $unidade_medida;
    private $tipo;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getUnidadeMedida() {
        return $this->unidade_medida;
    }
    public function setUnidadeMedida($unidade_medida) {
        $this->unidade_medida = $unidade_medida;
    }

    public function getTipo() {
        return $this->tipo;
    }
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
}

