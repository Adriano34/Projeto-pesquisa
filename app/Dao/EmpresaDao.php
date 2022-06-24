<?php

namespace App\Dao;
use App\Models\Empresa;

class EmpresaDao {
    public function create(Empresa $empresa) {

    }

    public function read() {

        $sql = 'SELECT * FROM empresas';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt->fetchall(\PDO::FETCH_ASSOC);
            return $resultado;
        else:
            return[];
        endif;
    }

    public function update(Empresa $empresa) {
        $sql = 'UPDATE empresas SET nome = ?, telefone = ?, site = ?, uf = ?, 
        municipio = ?, atualiazado_em = ? WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($slq);
        $stmt->bindValue(1, $empresa->getNome());
        $stmt->bindValue(2, $empresa->getTelefone());
        $stmt->bindValue(3, $empresa->getSite());
        $stmt->bindValue(4, $empresa->getUf());
        $stmt->bindValue(5, $empresa->getMunicipio());
        $stmt->bindValue(6, $empresa->getAtualizadoEm());
        $stmt->bindValue(7, $empresa->getId());

        $stmt->execute();
        
    }

    public function delete($id) {

        $sql = 'DELETE * FROM empresas WHERE id = ?';

        $stmt = Conexao::getConn()->prepare(sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
