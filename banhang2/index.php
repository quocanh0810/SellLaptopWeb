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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="holder.min.js"></script>
    <script type="text/javascript" src="process/process_ajax.js"></script>
    <link rel="stylesheet" href="hellocss.css">
    <script src="https://kit.fontawesome.com/93d337f834.js" crossorigin="anonymous"></script>


</head>
<body>

<nav class="nav navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="fontsize14 navbar-brand  mr-3 px-1" href="index.php">Thời gian làm việc : 8h30 - 20h30</a>
    <a class="fontsize14 navbar-brand  mr-3 px-1" href="index.php">Trang chủ</a>
    <a class="fontsize14 navbar-brand  mr-3 px-1" href="index.php">Tin tức</a>
    <a class="fontsize14 navbar-brand  mr-3 px-1" href="index.php">Video</a>
    <a class="fontsize14 navbar-brand  mr-3 px-1" href="index.php">Giới thiệu</a>
    <a class="fontsize14 navbar-brand  mr-3 px-1" href="index.php">Liên hệ</a>
    <ul class="fontsize14 navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <?php if(isset($_SESSION["user"])) :?>
                <i class="fas fa-user" style="color: white;"></i>
                <span>
                <a href="#" class="fontsize14" style="color: white;text-decoration: none;margin-right: 10px;" ><?php echo $_SESSION["user"]["username"] ?></a>
            </span>
                <span>
                <?php
                echo "<a class=\"fontsize14\" style=\"color: white;text-decoration: none;\" href='logout.php'>Đăng xuất</a>";
                ?>
            </span>
            <?php else: ?>
                <span>
                    <a href="login.php#" style="color: white;text-decoration: none;margin-right: 20px;" >Đăng nhập</a>
                </span>
                <span>
                    <a href="register.php#" style="color: white;text-decoration: none;">Đăng ký</a>
                </span>
            <?php endif; ?>
        </li>
    </ul>
</nav>

<aside class="aside-box">
    <article class="container">
        <div class="list-marketing">
            <div class="row">
                <div class="col-md-8 H-marketing-box">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" >
                        <div class="row">
                            <div class="col-md-12">
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0"></li>
                                    <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="img/slide/km-tuu-truong-slide.jpg" class="img bd-placeholder-img" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></img>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/slide/slide-giam-gia-mvgear.png" class="img bd-placeholder-img" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></img>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/slide/tra-gop.png" class="img bd-placeholder-img" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></img>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true" style="position: absolute;top: 155px;left: 15px;"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next" style="position: absolute;top: 155px;right: 172px">
                                    <span class="carousel-control-next-icon" aria-hidden="true" style="position: absolute;top: -4px;right: -137px"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="MLR0 col-md-4 H-marketing-box">
                    <div class="row">
                        <div class="MB20 col-md-12 col-sm-6 col-6" >
                            <img class="img" src="img/laptop-chuyen-do-hoa.jpg">
                        </div>
                        <div class="MB20 col-md-12 col-sm-6 col-6">
                            <img class="img" src="img/bang-bao-gia.png">
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </article>
</aside>

<div class="container">
    <h2 style="display: initial;"><button id="icon_menu_responsive"><span><i class="fas fa-bars"></i></span></button></h2>
    <h2 style="display: inline-block;">Giỏ Hàng</h2>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#icon_menu_responsive").click(function () {
            $(".responsive_menu_box").slideToggle();
        });
    });
</script>

<?php if(isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item']) ) { ?>
    <div class="container responsive_menu_box">
        <p>Chi tiết giỏ hàng của bạn</p>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá tiền</th>
                <th>Số lượng</th>
                <th>Thành tièn</th>
                <th>Xóa khỏi giỏ hàng</th>
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

                        <!--xoa sp khoi gio hang-->
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
        <div class="row">
            <p class="col-md-6 col-sm-6 col-xs-6 col-6">Tổng hóa đơn thanh toán:<span><strong> <?php echo number_format($total) ?> VNĐ</strong></span></p>
            <div class="pay col-md-6 col-sm-6 col-xs-6 col-6" ><a class="btn btn-sm btn-outline-secondary" href="pay.php" >Thanh toán</a></div>
        </div>
    </div>

<?php } else { ?>
    <div class="container">
        <p style="text-align: center;">Giỏ hàng của bạn đang rỗng!!!</p>
    </div>
<?php } ?>

<?php

$sql = "SELECT * FROM products LIMIT 0,8";

$result = $connection->query($sql);

if($result->num_rows > 0){  //Nếu $result->num_rows > 0 ==>Có dữ liệu
    while($row = $result->fetch_assoc()){ //mỗi lần lặp sẽ lấy ra 1 biến $row
        //fetch_assoc() lấy ra 1 mảng (phải tạo ra 1 mảng để chứa dữ liệu VÍ dụ như mảng $data ở trên)
        $data[] = $row;
    }
}


?>

<div class="container-search-box col-md-12 col-sm-12 col-12">
    <div class="container">
        <form action="search.php" name="" method="get">
            <div class="row search-box">
                <input type="text" name="search" class="search-input btn btn-outline-light col-md-6 col-sm-6 col-6" value="" placeholder="Nhập sản phẩm cần tìm kiếm">
                <input type="submit" name="translate" class="translate-input btn btn-info col-md-2 col-sm-5 col-5" value="Tìm kiếm">
            </div>
        </form>
    </div>
</div>

<main>
    <div class="container box-container">
        <div class="title-products-box">
            <div class="title-product">
                <a href="#">
                    <H4>MÁY HỌC TẬP,LÀM VIỆC ONLINE</H4>
                </a>
            </div>
        </div>

        <div class="row ajax-box">
            <?php if(!empty($data)) : ?>
                <?php foreach ($data as $post) : ?>
            <div class="col-md-3 col-sm-6 col-xs-6 products-list-box">
                <div class="card product-box">
                    <form name="products" <?php echo $post['id'] ?> action="process/process.php" method="post">
                        <a href="#" class="a-in-img">
                            <img class="img" src="img/products/<?php echo $post["product_image"] ?>">
                        </a>
                        <div class="product">
                            <h5 class="pro-title"><a href="#" class="text-product"><?php echo $post["product_name"] ?></a></h5>
                            <p class="product-info"><?php echo $post["product_info"] ?></p>
                            <p>
                                   <span>
                                       <b class="text-bold">Bảo hành: <?php echo $post["product_guarantee"] ?></b>
                                   </span>
                                <br>
                                <span>
                                       <b class="text-bold">Kho: <?php echo $post["product_warehouse"] ?></b>
                                   </span>
                            </p>
                            <div>
                                <p class="price-box">
                                    <span class="text-price"><?php echo number_format($post["price"],"0",".",".") ?><span class="text-gia">đ</span></span>
                                    <span>
                                           <div class="form-inline">
                                                    <input type="hidden" name="quantity">
                                                    <input type="hidden" name="action" value="add">
                                                    <input type="hidden" name="product_id" value="<?php echo $post['id'] ?>">
                                                    <input type="submit" name="submit" class="input btn btn-sm btn-outline-secondary" style="margin-top: 10px;" value="Thêm vào giỏ hàng"/>
                                           </div>
                                       </span>
                                </p>
                            </div>
                    </form>
                    </div>
            </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
        <div class="button-box">
            <button id="load-more" onclick="Displaynonebutton()" type="button" class="button input btn btn-sm btn-success">Xem thêm sản phẩm</button>
        </div>
</main>



</body>
</html>