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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
            <a class="fontsize14 nav-link navbar-brand  mr-0 px-1" style="margin-right: 2px;" href="#">Đăng ký |</a>
            <a class="fontsize14 nav-link navbar-brand  mr-3 px-1" href="login.php">Đăng nhập</a>
        </li>
    </ul>
</nav>


<h1 style="color: forestgreen;text-align: center;margin-top: 40px;">Đăng ký trở thành thành viên của MinhVuComputer</h1>

<?php
session_start();
include_once "database.php";
$db = new Database();
$connection = $db::$connection;
include_once "process/process_validate_form.php";

?>

<?php if(isset($error_register["error"])) { ?>
    <p style="color: red;font-size: 25px;text-align: center;font-weight: 800;"><?php echo $error_register["error"]; ?></p>
<?php } ?>


<div class="container">
    <form name="register" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Họ và tên:</label>
            <?php if(isset($error["fullname"])) { ?>
                <span class="error"><?php echo $error["fullname"]; ?></span>
            <?php } ?>
            <input type="text" class="form-control" id="inputFullname" name="fullname" placeholder="Nhập họ và tên của bạn">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tên đăng nhập:</label>
            <?php if(isset($error["username"])) : ?>
                <span class="error"><?php echo $error["username"]; ?></span>
            <?php endif; ?>
            <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Nhập tên đăng nhập của bạn">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <?php if(isset($error["email"])) : ?>
                <span class="error"><?php echo $error["email"]; ?></span>
            <?php endif; ?>
            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Your@email.com">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputPassword4">Mật khẩu</label>
                <?php if(isset($error["password"])) : ?>
                    <span class="error"><?php echo $error["password"]; ?></span>
                <?php endif; ?>
                <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Nhập lại mật khẩu</label>
                <?php if(isset($error["password_not_equal"])) : ?>
                    <span class="error"><?php echo $error["password_not_equal"]; ?></span>
                <?php endif; ?>
                <input type="password" class="form-control" name="repassword" id="inputRePassword" placeholder="Re-enter password">
            </div>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <div class="row" style=" display: inherit;text-align: center;">
            <button type="submit" class="btn btn-primary">Đăng ký</button>
            <button type="reset" class="btn btn-primary">Nhập lại</button>
        </div>
    </form>
</div>


</body>
</html>