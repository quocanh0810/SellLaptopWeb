<?php
session_start();
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

<h1 style="color: forestgreen;text-align: center;margin-top: 40px;">Thanh toán</h1>

<?php if(isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])) { ?>

<div>
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <td>Mã sản phẩm</td>
                <td>Tên sản phẩm</td>
                <td>Hình ảnh</td>
                <td>Giá tiền</td>
                <td>Số lượng</td>
                <td>Tổng</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
    <?php
    $total = 0;
    foreach ($_SESSION['cart_item'] as $key_cart => $val_cart_item): ?>
            <tr>
                <td><?php echo $val_cart_item['id'] ?></td>
                <td><?php echo $val_cart_item['product_name'] ?><br><span style="color: red;"><?php echo $val_cart_item['product_info'] ?></span></td>
                <td><img class="card-img-top" style="height: 25px; width: auto;display: block" src="img/products/<?php echo $val_cart_item['product_image'] ?>" data-holder-rendered="true"></td>
                <td><?php echo $val_cart_item['price'] ?></td>
                <td><?php echo $val_cart_item['quantity'] ?></td>
                <td><?php
                    $total_item = $val_cart_item['price'] * $val_cart_item['quantity'];
                    echo number_format($total_item);
                    ?> VNĐ</td>
                <td>
                    <form name="remove<?php $val_cart_item['id']?>" action="process/process.php" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $val_cart_item['id'] ?>">
                        <input type="hidden" name="action" value="remove">
                        <input type="submit" name="submit" class="btn btn-sm btn-outline-secondary" value="Xóa"/>
                    </form>
                </td>
            </tr>
        <?php
        $total += $total_item;
    endforeach; ?>
        </tbody>
    </table>
</div>
<div class="container">
    <div class="row">
        <p class="col-12" style="text-align: end">Tổng tiền:<span><strong> <?php echo number_format($total) ?> VNĐ</strong></span></p>
    </div>
</div>
<?php }else { ?>
    <div class="container">
        <p style="text-align: center;">Giỏ hàng của bạn đang rỗng!!!</p>
    </div>
<?php } ?>
<div class="container">
    <h3>Thông tin người nhận</h3>
    <form name="pay" action="" method="post">
        <table class="table">
            <div class="form-group">
                <tr>
                    <td width="10%">Họ tên:</td>
                    <td><input type="text" class="form-control" name="fullname" placeholder="Họ tên của bạn" value=""></td>
                </tr>
            </div>
            <div class="form-group">
                <tr>
                    <td>Địa chỉ:</td>
                    <td><input type="text" class="form-control" name="address" placeholder="Địa chỉ của bạn" value=""></td>
                </tr>
            </div>
            <div class="form-group">
                <tr>
                    <td>Điện thoại:</td>
                    <td><input type="text" class="form-control" name="phonenumber" placeholder="Số điện thoại của bạn"></td>
                </tr>
            </div>
            <div class="form-group">
                <tr>
                    <td>Thư điện tử</td>
                    <td><input type="email" class="form-control" name="email" placeholder="Thư điện tử"></td>
                </tr>
            </div>
            <div class="form-group">
                <tr>
                    <td>Thông tin</td>
                    <td><textarea class="form-control" rows="4" placeholder="Laptop Minh Vũ sẽ gọi lại ngay khi bạn gửi đơn hàng"></textarea></td>
                </tr>
            </div>
        </table>
        <div class="row" style="display: inherit;text-align: center;margin-bottom: 50px;">
            <button class="btn btn-primary" type="submit" name="submit" style="text-align: center;">Gửi đơn hàng</button>
        </div>
    </form>
</div>



</body>
</html>