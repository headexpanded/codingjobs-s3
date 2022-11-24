<?php
// display details of a flower


require_once('FlowerAPIManager.php');

if (isset($_GET['id'])) $flower = FlowerManager::find($_GET['id']);

if (isset($_GET['name'])) $flower = FlowerManager::findByName($_GET['name']);

if (isset($_GET['column']) && isset($_GET['direction']))
    $flower = FlowerManager::sortBy($_GET['column'], $_GET['direction']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Details</title>
</head>

<body>
    <p><?= $flower->name ?></p>
    <p><?= $flower->price ?></p>
    <a href="./view-flowers.php">Back</a>
    <br>
    <a href="./json-flower.php?id=<?= $flower->id ?>">JSON</a>


    <div>




    </div>
</body>

</html>