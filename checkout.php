<?php

session_start();

require_once("./libs/Query.php");
require_once("./libs/Router.php");

$query = new Query();
$router = new Router();

$id = "";
$nameProduct = "";
$price = 0;

$username = "";
$idUser = "";

if (isset($_SESSION["role"])) {
    $username = $_SESSION["name"];
    $idUser = $_SESSION["id"];
} else {
    header("Location:./login.php");
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $product = $query->getProduct($id);
    $nameProduct = $product[0]["name"];
    $price = $product[0]["price"];
}

$result = $query->getUser($idUser);

$email = $result[0]["email"];
$phone = $result[0]["phone"];
$address = $result[0]["address"];
$firstName = $result[0]["first_name"];
$lastName = $result[0]["last_name"];

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
    <link rel="stylesheet" href="./resource/css/styleCheckout.css" />
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
                <h3>Billing details</h3>
                <div class="row">
                    <label for="">First name</label>
                    <input type="text" class="single" value="<?= $firstName ?>" />
                </div>
                <div class="row">
                    <label for="">Last name</label>
                    <input type="text" class="single" value="<?= $lastName ?>" />
                </div>
                <div class="row">
                    <label for="">Address</label>
                    <input type="text" class="single" value="<?= $address ?>" />
                </div>
                <div class="row">
                    <label for="">Email</label>
                    <input type="text" class="single" value="<?= $email ?>" />
                </div>
                <div class="row">
                    <label for="">Phone</label>
                    <input type="text" class="single" value="<?= $phone ?>" />
                </div>
                <div class="rowbtn">
                    <a class="btn" href="success.php">Buy Now</a>
                    <a class="btn" href="index.php">Cancel</a>
                </div>
            </div>
            <div class="content">
                <h3>YOUR ORDER</h3>
                <div class="row">
                    <div>Product:</div>
                    <p><?= $name ?></p>
                </div>
                <div class="row">
                    <div>Price Product:</div>
                    <p><?= $price ?> VND</p>
                </div>
                <div class="row">
                    <div>Registration Tax:</div>
                    <p>1.649.500 VNĐ</p>
                </div>
                <div class="row">
                    <div>License Plate Fee:</div>
                    <p>2.000.000 VNĐ</p>
                </div>
                <div class="row">
                    <div>Shipping:</div>
                    <p>200.000 VND</p>
                </div>
                <div class="rowtotal">
                    <h4>TOTAL: </h4>
                    <p><?= $price + 200000 + 1649500 + 2000000 ?> VND</p>
                </div>
            </div>
        </div>
    </section>

    <?php
    require("pages/footer.php");
    ?>
</body>

</html>