<?php

include "database.php";

$current = (int) $_POST["current"];
$limit = (int) $_POST["limit"];

$db = new Database();
$connection = $db::$connection;
$sql = "SELECT * FROM products LIMIT $current,$limit";

$result = $connection->query($sql);

$data = array();

if($result->num_rows >0){
    while ($row = $result->fetch_assoc()){
        $data[]=$row;
    }
}

$html ="";

if(!empty($data)) :
    foreach ($data as $post) :
            $html .= '<div class="col-md-3 col-sm-6 col-xs-6 products-list-box">
                <div class="card product-box">
                    <form name="products" action="process/process.php" method="post">
                        <a href="#" class="a-in-img">
                            <img class="img" src="img/products/' .$post["product_image"].'">
                        </a>
                        <div class="product">
                            <h5 class="pro-title"><a href="#" class="text-product">'.$post["product_name"].'</a></h5>
                            <p class="product-info">'.$post["product_info"].'</p>
                            <p>
                                   <span>
                                       <b class="text-bold">Bảo hành: '.$post["product_guarantee"].'</b>
                                   </span>
                                <br>
                                <span>
                                       <b class="text-bold">Kho:'.$post["product_warehouse"].'</b>
                                   </span>
                            </p>
                            <div>
                                <p class="price-box">
                                    <span class="text-price">'.$post["price"].'<span class="text-gia">đ</span></span>
                                    <span>
                                           <div class="form-inline">
                                                    <input type="hidden" name="quantity">
                                                    <input type="hidden" name="action" value="add">
                                                    <input type="hidden" name="product_id" value="'.$post["id"].'">
                                                    <input type="submit" name="submit" class="input btn btn-sm btn-outline-secondary" style="margin-top: 10px;" value="Thêm vào giỏ hàng"/>
                                           </div>
                                       </span>
                                </p>

                            </div>
                    </form>
                    </div>
            </div>
            </div>';
    endforeach;
endif;

$response = array();
$response["success"] = 1;
$response["html"] = "$html";

echo json_encode($response);
exit;