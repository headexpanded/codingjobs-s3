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
        $flowers = FlowerManager::findAll();

        foreach ($flowers as $flower) {


            echo "Flower Name: " . $flower['name'] . "<br>";
            echo "Flower Price: " . $flower['price'] . "<br>";
            echo '<a href="./flower-detail.php?id=' . $flower['id'] . '">See More</a>';
            echo "<hr>";
        }


        ?>
    </div>
    <div>


    </div>

</body>

</html>