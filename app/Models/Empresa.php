<?php

namespace App\Models;

class Empresa {
    private $id;
    private $nome;
    private $telefone;
    private $site;
    private $preco_arla;
    private $preco_cambio;
    private $preco_implemento;
    private $preco_ipva;
    private $preco_lavagem;
    private $preco_licenciamento;
    private $preco_motor;
    private $preco_pneus;
    private $preco_recapagem;
    private $comercializa_arla;
    private $comercializa_cambio;
    private $comercializa_implemento;
    private $comercializa_ipva;
    private $comercializa_lavagem;
    private $comercializa_licenciamento;
    private $comercializa_motor;
    private $comercializa_pneus;
    private $comercializa_recapagem;

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
    public function setTelefone() {
        $this->telefone = $telefone;
    }

    public function getSite() {
        return $this->site;
    }
    public function setSite() {
        $this->site = $site;
    }

    public function getPrecoCambio() {
        return $this->preco_cambio;
    }
    public function setPrecoCambio() {
        $this->preco_cambio = $preco_cambio;
    }

    public function getPrecoImplemento() {
        return $this->preco_implemento;
    }
    public function setPrecoImplemento() {
        $this->preco_implemento = $preco_implemento;
    }

    public function getPrecoIpva() {
        return $this->preco_ipva;
    }
    public function setPrecoIpva() {
        $this->preco_ipva = $preco_ipva;
    }

    public function getPrecoMotor() {
        return $this->preco_motor;
    }
    public function setPrecoMotor() {
        $this->preco_motor = $preco_motor;
    }

    public function getPrecoPneus() {
        return $this->preco_pneus;
    }
    public function setPrecoPneus() {
        $this->preco_pneus = $preco_pneus;
    }

    public function getPrecoRecapagem() {
        return $this->telefone;
    }
    public function setPrecoRecapagem() {
        $this->preco_recapagem = $preco_recapagem;
    }

    public function getComercializaArla() {
        return $this->comercializa_arla;
    }
    public function setComercializaArla() {
        $this->comercializa_arla = $comercializa_arla;
    }

    public function getComercializaCambio() {
        return $this->comercializa_cambio;
    }
    public function setComercializaCambio() {
        $this->comercializa_cambio = $comercializa_cambio;
    }

    public function getComercializaImplemento() {
        return $this->comercializa_implemento;
    }
    public function setComercializaImplemento() {
        $this->comercializa_implemento = $comercializa_implemento;
    }

    public function getComercializaIpva() {
        return $this->comercializa_ipva;
    }
    public function setComercializaIpva() {
        $this->comercializa_ipva = $comercializa_ipva;
    }

    public function getComercializaLavagem() {
        return $this->comercializa_lavagem;
    }
    public function setComercializaLavagem() {
        $this->comercializa_lavagem = $comercializa_lavagem;
    }

    public function getComercializaLicenciamemto() {
        return $this->comercializa_licenciamento;
    }
    public function setComercializaLicenciamemto() {
        $this->comercializa_licenciamento = $comercializa_licenciamento;
    }

    public function getComercializaMotor() {
        return $this->comercializa_motor;
    }
    public function setComercializaMotor() {
        $this->comercializa_motor = $comercializa_motor;
    }

    public function getComercializaPneus() {
        return $this->comercializa_pneus;
    }
    public function setComercializaPneus() {
        $this->comercializa_pneus = $comercializa_pneus;
    }

    public function getComercializaRecapagem() {
        return $this->comercializa_recapagem;
    }
    public function setComercializaRecapagem() {
        $this->comercializa_recapagem = $comercializa_recapagem;
    }
}

