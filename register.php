<?php
session_start();

require_once("./libs/Query.php");
$query = new Query();

if (isset($_POST["submit"])) {
    $password = $_POST["password"];
    $c_password = $_POST["c_password"];
    if ($password != $c_password) {
        echo '<script>alert("Register Failed");</script>';
    } else {
        $query->insertUser($_POST["first_name"], $_POST["last_name"], $_POST["phone"], $_POST["address"], $_POST["email"], $_POST["role"], $_POST["password"]);

        $result = $query->login($_POST["email"], $_POST["password"]);
        if ($result) {
            $_SESSION["id"] = $result["id"];
            $_SESSION["name"] = $result["first_name"];
            $_SESSION["role"] = $result["role"];

            header("Location:./index.php");
        } else {
            echo '<script>alert("Login Failed")</script>';
        }

        $_SESSION["id"] = $result["id"];
        $_SESSION["name"] = $_POST["first_name"];
        $_SESSION["role"] = $_POST["role"];

        // header("Location:./index.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./resource/css/style.css" />
    <link rel="stylesheet" href="./resource/css/styleAdmin.css" />
    <title>Store</title>
</head>

<body>
    <div class="title">Register</div>

    <form class="formInput" action="" method="POST">

        <label for="">First Name</label>
        <input type="text" name="first_name">
        <br>
        <label for="">Last Name</label>
        <input type=" text" name="last_name">
        <br>
        <label for="">Phone</label>
        <input type="text" name="phone">
        <br>
        <label for="">Address</label>
        <input type="text" name="address">
        <br>
        <label for="">Email</label>
        <input type="text" name="email">
        <br>
        <label for="">Role</label>
        <input type="text" name="role">
        <br>
        <label for="">Password</label>
        <input type="password" name="password">
        <br>
        <label for="">Confirm Password</label>
        <input type="password" name="c_password">
        <br>


        <button type="submit" name="submit">Register</button>
        <button type="button" onclick="document.location='index.php' ">Cancel</button>

    </form>

</body>

</html>