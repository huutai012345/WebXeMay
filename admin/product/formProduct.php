<?php

$name = "";
$description = "";
$price = "";
$amount = "";
$idCate = "";
$img = "";

$title = "Add";
$id = "";

if ($_GET["f"] == "add") {
    if (isset($_POST["submit"])) {

        $file = new UploadFile($_FILES);
        $img =  $file->upload();

        if (isset($_POST["name"])) {
            $query->insertProduct(
                $_POST["name"],
                $_POST["description"],
                $_POST["price"],
                $_POST["amount"],
                $_POST["idCate"],
                $img
            );
        }

        header("Location:index.php?p=product");
    }
} else {
    $id = $_GET["id"];
    $title = "Edit";
    $result = $query->getProduct($id);

    $name = $result[0]["name"];
    $description = $result[0]["description"];
    $price = $result[0]["price"];
    $amount = $result[0]["amount"];
    $idCate = $result[0]["idCate"];
    $img = $result[0]["img"];

    if (isset($_POST["submit"])) {
        if ($_FILES['img']['name'] != '') {
            $file = new UploadFile($_FILES);
            $img =  $file->upload();
        }

        if (isset($_POST["name"])) {
            $query->updateProduct($id, $_POST["name"], $_POST["description"], $_POST["price"], $_POST["amount"], $_POST["idCate"], $img);
        }
        header("Location:index.php?p=product");
    }
}

?>

<form class="formInput" action="" method="POST" enctype="multipart/form-data">

    <label for="">Name</label>
    <input type="text" name="name" value="<?= $name ?>">
    <br>
    <label for="">Description</label>
    <input type="text" name="description" value="<?= $description ?>">
    <br>
    <label for="">Price</label>
    <input type="text" name="price" value="<?= $price ?>">
    <br>
    <label for="">Amount</label>
    <input type="text" name="amount" value="<?= $amount ?>">
    <br>
    <label for="">Category</label>
    <input type="text" name="idCate" value="<?= $idCate ?>">
    <br>
    <label for="">Img</label>
    <input type="file" name="img" id="img">

    <button type="submit" name="submit">Save</button>
    <button type="button" onclick="document.location='index.php?p=product' ">Cancel</button>

</form>