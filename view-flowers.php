<?php

require_once('FlowerManager.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowers</title>
</head>

<body>
    <div>
        <?php

        if (isset($_GET['id'])) $flower = FlowerManager::find($_GET['id']);
        else
        if (isset($_GET['name'])) $flower = FlowerManager::findByName($_GET['name']);
        else 
        if (isset($_GET['column']) && isset($_GET['direction']))
            $flowers = FlowerManager::sortBy($_GET['column'], $_GET['direction']);


        $flowers = FlowerManager::findAll();

        foreach ($flowers as $flower) {


            echo "Flower Name: " . $flower->name . "<br>";
            echo "Flower Price: " . $flower->price . "<br>";
            echo '<a href="./flower-detail.php?id=' . $flower->id . '">See More</a><br>';

            echo "<hr>";
        }
        echo '<a href="./all-flowers.php">View JSON for all flowers</a><br>';
        echo '<a href="./insert-flower.php">Add New Flower</a><br>';

        ?>
    </div>
    <div>


    </div>

</body>

</html>