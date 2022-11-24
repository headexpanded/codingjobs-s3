<?php
require_once('FlowerManager.php');
$errors = array();
$flowerName = "";
$flowerPrice = "";

if (isset($_POST['insert'])) {
    if (!empty($_POST['name']))
        $flowerName = $_POST['name'];
    else
        $errors['name'] = "Name is required.<br>";

    if (!empty($_POST['price']))
        $flowerPrice = $_POST['price'];
    else
        $errors['price'] = "Price is required.<br>";

    $insertFlower = FlowerManager::insertFlower($flowerName, $flowerPrice);
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Flower</title>
</head>

<body>
    <div style="width:800px; margin: 0 auto;">

        <form style="display: flex; flex-direction: column; gap:1.5em" action="
" method="post">
            <label for="name">Flower Name</label>
            <input type="text" name="name" id="">
            <label for="price">Flower Price</label>
            <input type="text" name="price" id="">
            <div><input type="submit" value="Insert" name="insert"></div>

        </form>


    </div>
    </div>
</body>

</html>