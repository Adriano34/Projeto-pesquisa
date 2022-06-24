<?php

namespace App\Dao;
use App\Models\Item;

class ItemDao {
    public function create(Item $item){

    }

    public function read() {

        $sql ='SELECT * FROM  itens';

        $Stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() > 0):
            $resultado = $stmt->fetchall(\PDO::FETCH_ASSOC);
            return $resultado;
    else:
        return[];
    endif;

    }

    public function update(Item $item) {

        $sql = 'UPDATE itens SET nome = ?, nome = ?, 
        descricao = ?, unidade_medida = ?, tipo = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $item->getNome());
        $stmt->bindValue(2, $item->getDescricao());
        $stmt->bindValue(3, $item->getUnidadeMedida());
        $stmt->bindValue(4, $item->getTipo());
        $stmt->bindValue(5, $item->getId());

        $stmt->execute();

    }

    public function delete($id) {

        $sql = 'DELETE * FROM itens WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

    }
}
