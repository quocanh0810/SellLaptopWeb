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
            <a class="fontsize14 nav-link navbar-brand  mr-3 px-1" href="#">Đăng nhập</a>
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


<div class="container-search-box col-md-12 col-sm-12 col-12">
    <div class="container">
        <form action="search.php" name="" method="get">
            <div class="row search-box">
                <input type="text" name="search" class="search-input btn btn-outline-light col-md-6 col-sm-6 col-6" value="" placeholder="Nhập sản phẩm cần tìm kiếm">
                <input type="submit" name="translate" class="translate-input btn btn-info col-md-1 col-sm-3 col-3" value="Tìm kiếm">
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

        <?php

        $search = isset($_GET["search"]) ? $_GET["search"] :"";
        $linkSearch = "search.php?search=$search";

        //nạp file kết nối csdl

        if(strlen($search) > 0) {
            $sql = "SELECT * FROM products WHERE product_name LIKE '%$search%'";

            $result = $connection->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $data[]=$row;
                }
            } else{
                $my_var = '<h4 style="color: red;text-align: center;margin-top: 30px;">Không có kết quả nào được tìm thấy</h4>';
                echo $my_var;
            }
        }

        ?>

        <div class="row ajax-box">
            <?php if(!empty($data)) : ?>
            <?php foreach ($data as $post) : ?>
            <div class="col-md-3 col-sm-6 col-xs-6 products-list-box">
                <div class="card product-box">
                    <form name="products" action="#" method="post">
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
                                    <span class="text-price"><?php echo $post["price"] ?><span class="text-gia">đ</span></span>
                                    <span>
                                           <div class="form-inline">
                                                    <input type="hidden" name="quantity">
                                                    <input type="hidden" name="action" value="add">
                                                    <input type="hidden" name="product_id" value="">
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
</main>


</body>
</html>