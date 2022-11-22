<?php

require_once('FlowerManager.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON Flower</title>
</head>

<body>
    <div>
        <?php
        $flower = FlowerManager::find($_GET['id']);


        echo json_encode($flower, JSON_PRETTY_PRINT);
        echo '<br><hr>';
        echo '<a href="view-flowers.php">Back</a>';



        ?>
    </div>
    <div>


    </div>

</body>

</html>