<?php
require_once('FlowerManager.php');
require_once('flower.php');
class FlowerAPIManager
{

    public static function findAll()
    {
        //get all flower data from FlowerManager
        $api =  new FlowerManager;
        $result = $api::findAll();

        return json_encode($result, JSON_PRETTY_PRINT);
    }

    public static function find($id)
    {
        //get single flower data from FlowerManager
        $api =  new FlowerManager;
        $result = $api::find($id);

        return json_encode($result, JSON_PRETTY_PRINT);
    }

    public static function findByName($name)
    {
        // get all flower data matching $name
        $api = new FlowerManager;
        $result = $api::findByName($name);
        return json_encode($result, JSON_PRETTY_PRINT);
    }

    public static function sortBy($column, $direction)
    {
        // get all flower data matching $name
        $api = new FlowerManager;
        $result = $api::sortBy($column, $direction);
        return json_encode($result, JSON_PRETTY_PRINT);
    }
}
