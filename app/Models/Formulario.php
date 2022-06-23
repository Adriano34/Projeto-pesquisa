<?php

namespace App\Models;

class Formulario {
    private $id;
    private $tipo;
    private $criado_em;
    private $atualizado_em;
    private $publicado_em;
    private $emrpesa_id;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getTipo() {
        return $this->tipo;
    }
    public function setTipo($tipo) {
        $this->tipo = $tipo;
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

    public function getPublicadoEm() {
        return $this->publicado_em;
    }
    public function setPublicadoEm($publicado_em) {
        $this->publicado_em = $publicado_em;
    }

    public function getEmpresaId() {
        return $this->empresa_id;
    }
    public function setEmpresaId($empresa_id) {
        $this->empresa_id = $empresa_id;
    }
}

