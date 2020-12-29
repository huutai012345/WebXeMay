<?php
$firstName = "";
$lastName = "";
$phone = "";
$address = "";
$email = "";
$role = "";
$password = "";
$title = "Add";
$id = "";

if ($_GET["f"] == "add") {
    if (isset($_POST["submit"])) {
        $query->insertUser($_POST["first_name"], $_POST["last_name"], $_POST["phone"], $_POST["address"], $_POST["email"], $_POST["role"], $_POST["password"]);
        header("Location:index.php?p=user");
    }
} else {
    $id = $_GET["id"];  
    $title = "Edit";
    $result = $query->getUser($id);

    $firstName = $result[0]["first_name"];
    $lastName = $result[0]["last_name"];
    $phone = $result[0]["phone"];
    $address = $result[0]["address"];
    $email = $result[0]["email"];
    $role = $result[0]["role"];
    $password = $result[0]["password"];

    if (isset($_POST["submit"])) {
        if (isset($_POST["name"])) {
            $query->updateUser($id, $_POST["first_name"], $_POST["last_name"], $_POST["phone"], $_POST["address"], $_POST["email"], $_POST["role"]);
        }
        header("Location:index.php?p=user");
    }
}

?>

<form class="formInput" action="" method="POST">

    <label for="">First Name</label>
    <input type="text" name="first_name" value="<?= $firstName ?>">
    <br>
    <label for="">Last Name</label>
    <input type="text" name="last_name" value="<?= $lastName ?>">
    <br>
    <label for="">Phone</label>
    <input type="text" name="phone" value="<?= $phone ?>">
    <br>
    <label for="">Address</label>
    <input type="text" name="address" value="<?= $address ?>">
    <br>
    <label for="">Email</label>
    <input type="text" name="email" value="<?= $email ?>">
    <br>
    <label for="">Role</label>
    <input type="text" name="role" value="<?= $role ?>">
    <br>
    <label for="">Password</label>
    <input type="text" name="password" value="<?= $password ?>">
    <br>


    <button type="submit" name="submit">Save</button>
    <button type="button" onclick="document.location='index.php?p=user' ">Cancel</button>

</form>