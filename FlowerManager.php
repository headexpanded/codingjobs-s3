<?php

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
        $flower = $prep->fetch(PDO::FETCH_ASSOC);

        return $flower;
        // close conn
        $pdo = null;
    }
}
