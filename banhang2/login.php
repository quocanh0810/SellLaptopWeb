<?php
include_once "database.php";
$db = new Database();
$connection = $db::$connection;
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="hellocss.css">

    <script src="https://kit.fontawesome.com/93d337f834.js" crossorigin="anonymous"></script>


</head>
<body>


<nav class="nav navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="fontsize14 navbar-brand  mr-3 px-1" href="search.php">Thời gian làm việc : 8h30 - 20h30</a>
    <a class="fontsize14 navbar-brand  mr-3 px-1" href="index.php">Trang chủ</a>
    <a class="fontsize14 navbar-brand  mr-3 px-1" href="search.php">Tin tức</a>
    <a class="fontsize14 navbar-brand  mr-3 px-1" href="search.php">Video</a>
    <a class="fontsize14 navbar-brand  mr-3 px-1" href="search.php">Giới thiệu</a>
    <a class="fontsize14 navbar-brand  mr-3 px-1" href="search.php">Liên hệ</a>
    <ul class="fontsize14 navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="fontsize14 nav-link navbar-brand  mr-0 px-1" style="margin-right: 2px;" href="register.php">Đăng ký |</a>
            <a class="fontsize14 nav-link navbar-brand  mr-3 px-1" href="login.php">Đăng nhập</a>
        </li>
    </ul>
</nav>

<h1 style="color: forestgreen;text-align: center;margin-top: 40px;">Đăng Nhập MinhVuComputer</h1>

<?php
include_once "process/process_login.php";
?>

<div class="container">
    <form name="login" method="post">
            <div class="form-group">
                <label for="inputEmail4">Username</label>
                <input type="text" class="form-control" name="username" id="inputUser" placeholder="Username or email">
            </div>
            <div class="form-group">
                <label for="inputPassword4">Mật khẩu</label>
                <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <div class="row" style="display: inherit;text-align: center;">
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
            </div>
    </form>
</div>


</body>
</html>