<?php
namespace App\Models;

class Conexao {
    private static $instance;

    public static function getConn() {
        if (!isset(self::$instance)):
            self::$instance = new \PDO('mysql:host=localhost;dbname=pesquisadeprecos;charset=utf8','root','');
        endif;
            return self::$instance;
    }
}