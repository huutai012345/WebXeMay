<?php

session_start();

require_once("../libs/Query.php");
require_once("../libs/Router.php");

$query = new Query();

if (isset($_POST["submit"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $pass = ($_POST["password"]);

    $result = $query->login($email, $pass);
    if ($result) {
        $_SESSION["id"] = $result["id"];
        $_SESSION["name"] = $result["first_name"];
        $_SESSION["role"] = $result["role"];

        if ($_SESSION["role"] == "ADMIN") {
            header("Location:../admin/index.php");
        } else {
            header("Location:../index.php");
        }
    } else {
        echo '<script>alert("Login Failed")</script>';
    }
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../resource/css/styleLogin.css" />
</head>

<body>
    <div class="wrapper">
        <div class="title">Login Form</div>
        <form action="#" method="POST">
            <div class="field">
                <input type="text" name="email" required />
                <label>Email Address</label>
            </div>
            <div class="field">
                <input type="password" name="password" required />
                <label>Password</label>
            </div>
            <div class="field">
                <input type="submit" value="Login" name="submit" />
            </div>
        </form>
    </div>
</body>

</html>