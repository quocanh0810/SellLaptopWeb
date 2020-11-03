<?php
session_start();
if (isset($_POST["username"]) && isset($_POST["password"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION["user"] = $_POST;
        header("Location:index.php");
        exit;
    } else if ($username != "") {
        echo "<p style='color: red;text-align: center;font-size: 20px;font-weight: 800;'>Username hoặc password không chính xác!!!</p>";
    }
}