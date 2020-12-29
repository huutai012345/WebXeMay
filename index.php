<?php

session_start();

require_once("./libs/Query.php");
require_once("./libs/Router.php");
$query = new Query();
$router = new Router();

$login = "Login";
$name = "";
if (isset($_SESSION["name"])) {
    $name = $_SESSION["name"];
    $login = "Logout";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./resource/css/style.css" />
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
        <div class="user">
            <?= $name ?>
            <a href="login.php"><?= $login ?></a>
        </div>
    </header>

    <slide>
        <img src="./resource/img/slide.jpg" alt="" width="100%" />
    </slide>

    <div class="search">
        <h3>What do you search here?</h3>
        <div>
            <input type="text" id="fname" name="fname" />
            <button class="btn">Search</button>
        </div>
    </div>

    <?php
    require("pages/product.php");
    require("pages/footer.php");
    ?>

</body>

</html>