<?php

require_once('FlowerManager.php');

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
        $flowers = FlowerManager::findAll();


        echo json_encode($flowers, JSON_PRETTY_PRINT);
        echo '<br><hr>';
        echo '<a href="view-flowers.php">Back</a>';



        ?>
    </div>
    <div>


    </div>

</body>

</html>