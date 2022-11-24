<?php

require_once('FlowerAPIManager.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON Flowers</title>
</head>

<body>
    <div>
        <?php
        if (isset($_GET['name'])) $flower = FlowerManager::findByName($_GET['name']);
        else 
        if (isset($_GET['column']) && isset($_GET['direction']))
            $flower = FlowerManager::sortBy($_GET['column'], $_GET['direction']);
        else $flower = FlowerManager::findAll();

        echo $flower;
        echo '<br><hr>';
        echo '<a href="view-flowers.php">Back</a>';



        ?>
    </div>
    <div>


    </div>

</body>

</html>