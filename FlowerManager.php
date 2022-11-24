<?php
require_once('flower.php');
class FlowerManager implements JsonSerializable
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
        // bind - can't remove quotes from variables, no so binding possible without magic
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

    public static function insertFlower($name, $price)
    {
        //open db conn
        $pdo = self::get_pdo();
        $query = "INSERT INTO flowers (flower_name, price) VALUES ('$name', '$price')";

        $prep = $pdo->prepare($query);
        // $prep->bindValue(':name', $name);
        // $prep->bindValue(':price', $price);
        // execute
        $result = $pdo->query($query);
        if ($result) self::jsonSerialize();
    }

    public function jsonSerialize()
    {
        return [
            'flowerName' => $this->name,
            'price' => $this->price

        ];
    }
}
