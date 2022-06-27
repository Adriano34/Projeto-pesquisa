<?php

namespace App\Dao;
use App\Models\Item;
use App\Database\Conexao;

class ItemDao {
    public function create(Item $item){

        $sql = 'INSERT INTO itens (nome, descricao, unidade_medida, tipo) VALUES (?, ?, ?, ?)';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $item->getNome());
        $stmt->bindValue(2, $item->getDescricao());
        $stmt->bindValue(3, $item->getUnidadeMedida());
        $stmt->bindValue(4, $item->getTipo());

        $stmt->execute();

    }

    public function listarTodos() {

        $sql = 'SELECT * FROM itens';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetchall(\PDO::FETCH_CLASS, Item::class);
        return $resultado;
        
    }

    public function listarPorId($id) {

        $sql = 'SELECT * FROM itens WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_CLASS, Item::class);
        $resultado = $stmt->fetch();
        return $resultado;
        
    }

    public function update(Item $item) {

        $sql = 'UPDATE itens SET nome = ?, 
        descricao = ?, unidade_medida = ?, tipo = ? WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $item->getNome());
        $stmt->bindValue(2, $item->getDescricao());
        $stmt->bindValue(3, $item->getUnidadeMedida());
        $stmt->bindValue(4, $item->getTipo());
        $stmt->bindValue(5, $item->getId());

        $stmt->execute();

    }

    public function delete($id) {

        $sql = 'DELETE FROM itens WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

    }
}
