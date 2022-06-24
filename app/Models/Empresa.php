<?php

namespace App\Models;

class Empresa {
    private $id;
    private $nome;
    private $telefone;
    private $site;
    private $uf;
    private $municipio_id;
    private $criado_em;
    private $atualizado_em;
    

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

    public function getTelefone() {
        return $this->telefone;
    }
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getSite() {
        return $this->site;
    }
    public function setSite($site) {
        $this->site = $site;
    }

    public function getUf() {
        return $this->uf;
    }
    public function setUf($uf) {
        $this->uf = $uf;
    }

    public function getMunicipioId() {
        return $this->municipio_id;
    }
    public function setMunicipioId($municipio_id) {
        $this->municipio_id = $municipio_id;
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
}

