<?php
$name = "";
$description = "";
$title = "Add";
$id = "";

if ($_GET["f"] == "add") {
    if (isset($_POST["submit"])) {
        if (isset($_POST["name"])) {
            $query->insertCate($_POST["name"], $_POST["description"]);
        }

        header("Location:index.php?p=category");
    }
} else {
    $id = $_GET["id"];
    $title = "Edit";
    $result = $query->getCate($id);
    $name = $result[0]["name"];
    $description = $result[0]["description"];

    if (isset($_POST["submit"])) {
        if (isset($_POST["name"])) {
            (new Query())->updateCate($id, $_POST["name"], $_POST["description"]);
        }

        header("Location:index.php?p=category");
    }
}

?>

<form class="formInput" action="" method="POST">

    <label for="">Name</label>
    <input type="text" name="name" value="<?= $name ?>">
    <br>
    <label for="">Description</label>
    <input type="text" name="description" value="<?= $description ?>">
    <br>

    <button type="submit" name="submit">Save</button>
    <button type="button" onclick="document.location='index.php?p=<?= $_GET['p'] ?>' ">Cancel</button>

</form>