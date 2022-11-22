<?php
require_once('flower.php');
class FlowerManager
{

    private static function get_pdo()
    {
        return new PDO('mysql:host=localhost;dbname=flower_db', 'root', 'root');
    }
    public static function findAll()
    {
        //open db conn

        $pdo = self::get_pdo();
        $query = 'SELECT * FROM flowers';
        $result = $pdo->query($query);
        $flowers = $result->fetchAll(PDO::FETCH_CLASS, 'Flower');

        // close conn
        $pdo = null;
        return $flowers;
    }

    public static function find($id)
    {
        //open db conn
        $pdo = self::get_pdo();

        $query = "SELECT * FROM flowers WHERE id = :id";

        // prepare
        $prep = $pdo->prepare($query);
        // bind
        $prep->bindValue(':id', $id);
        // execute
        $prep->execute();
        // fetch
        $prep->setFetchMode(PDO::FETCH_CLASS, 'Flower');
        $flower = $prep->fetch();

        return $flower;
        // close conn
        $pdo = null;
    }

    public static function findByName($name)
    {
        //open db conn
        $pdo = self::get_pdo();
        $query = "SELECT * FROM flowers WHERE name = :name";
        // prepare
        $prep = $pdo->prepare($query);
        // bind
        $prep->bindValue(':name', "%$name%");
        // execute
        $prep->execute();
        // fetch
        $prep->setFetchMode(PDO::FETCH_CLASS, 'Flower');
        $flower = $prep->fetch();

        return $flower;
        $pdo = null;
    }

    public static function sortBy($column, $direction)
    {
        //open db conn
        $pdo = self::get_pdo();
        $query = "SELECT * FROM flowers ORDER BY $column $direction";
        // prepare
        $prep = $pdo->prepare($query);
        // bind
        // $prep->bindValue(':column', $column);
        // $prep->bindValue(':direction', $direction);
        // execute
        $result = $pdo->query($query);
        // fetch
        $flowers = $result->fetchAll(PDO::FETCH_CLASS, 'Flower');

        // close conn
        $pdo = null;
        return $flowers;
    }
}
