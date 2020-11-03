<?php

session_start();
include_once("../database.php");
$db = new Database();
$connection = $db::$connection;

if(isset($_POST) && !empty($_POST)){
    /**check $_POST có tồn tại tức là có dữ liệu được gửi đi
     * đồng thời !empty tức là nó sẽ có dữ liệu được gửi
     *
     **/
    if(isset($_POST['action'])){
        switch ($_POST['action']){
            case 'add' :
                if(isset($_POST['quantity']) && isset($_POST['product_id'])){
                    $sql = "SELECT * FROM products WHERE id = ". (int)$_POST['product_id'];
                    $product = $db->runQuery($sql);
                    $product=current($product);
                    echo'<br> $product';
                    echo'<pre>';
                    print_r($product);
                    echo'</pre>';
                    $product_id = $product['id'];

                    if(isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])) {
                        /**
                         * !empty($_SESSION['cart_item'] == true
                         * tức là lúc này giỏ hàng có dữ liệu
                         */
                        if(isset($_SESSION['cart_item'][$product_id] )) {
                            $exist_cart_item = $_SESSION['cart_item'][$product_id];
                            $exist_quantity = $exist_cart_item['quantity'];
                            $cart_item = array();
                            $cart_item['id'] = $product['id'];
                            $cart_item['product_name'] = $product['product_name'];
                            $cart_item['product_info'] = $product['product_info'];
                            $cart_item['product_image'] = $product['product_image'];
                            $cart_item['price'] = $product['price'];
                            $cart_item['quantity'] = 1 + $exist_cart_item['quantity'];
                            $_SESSION['cart_item'][$product_id] = $cart_item;

                        }else{
                            $cart_item = array();
                            $cart_item['id'] = $product['id'];
                            $cart_item['product_name'] = $product['product_name'];
                            $cart_item['product_info'] = $product['product_info'];
                            $cart_item['product_image'] = $product['product_image'];
                            $cart_item['price'] = $product['price'];
                            $cart_item['quantity'] = 1;
                            $_SESSION['cart_item'][$product_id] = $cart_item;
                        }

                    }
                    else{
                        /**
                         * !empty($_SESSION['cart_item'] == false
                         * tức là lúc này giỏ hàng không có dữ liệu
                         */
                        $_SESSION['cart_item'] = array();

                        $product_id = $product['id'];
                        $cart_item = array();
                        $cart_item['id'] = $product['id'];
                        $cart_item['product_name'] = $product['product_name'];
                        $cart_item['product_info'] = $product['product_info'];
                        $cart_item['product_image'] = $product['product_image'];
                        $cart_item['price'] = $product['price'];
                        $cart_item['quantity'] = 1;
                        $_SESSION['cart_item'][$product_id] = $cart_item;
                    }


                }
                break;
            case 'remove' :
                if(isset($_POST['product_id'])){
                    $product_id = $_POST['product_id'];
                    if(isset($_SESSION['cart_item'][$product_id])) {
                        unset($_SESSION['cart_item'][$product_id]);
                    }
                }
                break;
            default:
                echo 'action không tồn tại';
                die;
        }
    }


}
header("Location: http://localhost/banhang2/index.php");
exit();


