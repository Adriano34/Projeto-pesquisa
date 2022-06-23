<?php

namespace App\Dao;
use App\Models\Empresa;

class EmpresaDao {
    public function create(Empresa $empresa) {

        $sql = 'INSERT INTO empresas (nome, telefone, uf, site, municipio, criado_em, atualizado_em) 
            VALUES (?,?,?,?,?,?,?)';

        $stmt = Conexao::getConnn()->prepare($sql);
        $stmt->bindValue(1, $e->getNome());
        $stmt->bindValue(2, $e->getTelefone());
        $stmt->bindValue(3, $e->getSite());
        $stmt->bindValue(4, $e->getUf());
        $stmt->bindValue(5, $e->getMunicipio());
        $stmt->bindValue(6, $e->getCriadoEm());
        $stmt->bindValue(7, $e->getAtualizadoEm());

        $stmt->execute();

    }
    }

    public function read() {

        $sql = 'SELECT * FROM  empresas';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->exeute();

        if ($stmt->rowCount() > 0):
            $resultado = $stmt->fetchall(\PDO::FETCH_ASSSOC);
            return $resultado;
        else:
            return[]
        endif;
    }

    public function update(Empresa $empresa) {
        $sql = 'UPDATE empresas SET nome = ?, descricao = ? WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($slq);
        $stmt->bindValue(1)

        
    }

    public function delete($id) {

    }

