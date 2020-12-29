<?php

session_start();

require_once("./libs/Query.php");
require_once("./libs/Router.php");

$query = new Query();
$router = new Router();

$id = "";
$name = "";
$description = "";
$price = "";
$category = "";
$img = "";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $result = $query->getProduct($id);

    $name = $result[0]["name"];
    $description = $result[0]["description"];
    $price = $result[0]["price"];
    $img = $result[0]["img"];
    $category = ($query->getCate($result[0]["idCate"]))[0]["name"];
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./resource/css/styleDetail.css" />
    <title>Store</title>
</head>

<body>
    <header>
        <div class="logo">
            <a href="index.php">
                <img src="./resource/img/logo.png" alt="" />
            </a>
        </div>
        <nav>
            <?php
            require("pages/category.php");
            ?>
        </nav>
    </header>

    <slide>
        <img src="./resource/img/slide.jpg" alt="" width="100%" />
    </slide>

    <section>
        <div class="container">
            <div class="info">
                <img src="./resource/img/xe5.jpg" alt="" width="70%" />
            </div>
            <div class="content">
                <h3><?= $name ?></h3>
                <div class="row">
                    <div>Price</div>
                    <p><?= $price ?></p>
                </div>
                <div class="row">
                    <div>Category:</div>
                    <p><?= $category ?></p>
                </div>
                <div class="row">
                    <div>Description:</div>
                    <p><?= $description ?></p>
                </div>
                <div class="rowbtn">
                    <a href="checkout.php?id=<?= $id ?>" class="btn">Buy Now</a>
                    <a href="index.php" class="btn">Cancel</a>
                </div>
            </div>
        </div>
    </section>

    <?php
    require("pages/footer.php");
    ?>
</body>

</html>