<?php

session_start();

require_once("../libs/Query.php");
require_once("../libs/Router.php");
require_once("../libs/Upload.php");

$query = new Query();
$router = new Router();

$username = "";
$idUser = "";
if (isset($_SESSION["role"]) && $_SESSION["role"] == 'ADMIN') {
  $name = $_SESSION["name"];
  $idUser = $_SESSION["id"];
} else {
  header("Location:../admin/login.php");
}

$page = "home.php";

if (isset($_GET["p"])) {
  switch ($_GET["p"]) {
    case 'category': {
        if (isset($_GET["f"])) {
          if ($_GET["f"] == "delete") {
            $id = $_GET["id"];
            if ($query->checkDeleteCate($id)) {
              $query->deleteCate($id);
            } else {
              echo '<script>alert("Category Can Not Delete");window.location.href="?p=category";</script>';
            }
            $page = "cate/listCate.php";
          } else {
            $page = "cate/formCate.php";
          }
        } else
          $page = "cate/listCate.php";
        break;
      }
    case 'product': {
        if (isset($_GET["f"])) {
          if ($_GET["f"] == "delete") {
            $id = $_GET["id"];
            $query->deleteProduct($id);
            $page = "product/listProduct.php";
          } else {
            $page = "product/formProduct.php";
          }
        } else
          $page = "product/listProduct.php";
        break;
      }
    case 'user': {
        if (isset($_GET["f"])) {
          if ($_GET["f"] == "delete") {
            $id = $_GET["id"];
            $query->deleteUser($id);
            $page = "user/listUser.php";
          } else {
            $page = "user/formUser.php";
          }
        } else
          $page = "user/listUser.php";
        break;
      }
    case 'logout': {
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        unset($_SESSION['role']);
        header("Location:../admin/login.php");
        break;
      }
    case 'home': {
        header("Location:../index.php");
        break;
      }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../resource/css/styleAdmin.css">
  <title>Document</title>
</head>

<body>
  <div class="title">ADMIN PAGE</div>
  <div class="userName">Hi <?= $name ?></div>
  <div class="menutop">
    <ul>
      <li>
        <a href="<?= $router->createURL("home") ?> ">Home</a>
      </li>
      <li>
        <a href="<?= $router->createURL("category") ?>">Category</a>
      </li>
      <li>
        <a href="<?= $router->createURL("product") ?>">Product</a>
      </li>
      <li>
        <a href="<?= $router->createURL("user") ?>">User</a>
      </li>
      <li>
        <a href="<?= $router->createURL("logout") ?>">Logout</a>
      </li>
    </ul>
  </div>
  <div class="table-box">
    <?php
    require($page);
    ?>
  </div>

  <sc src="../resource/js/mainAdmin.js"></sc>
</body>

</html>