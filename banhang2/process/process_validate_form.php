<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {

        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];

        $error = array();
        $error_register = array();
        $parttern_username = "/^[a-zA-Z0-9]{5,}$/";
        $parttern_email = "/([\w\-]+\@[\w\-]+\.[\w\-]+)/";

        $sql = "SELECT * FROM user WHERE username='$username'";
        $result = $connection->query($sql);

        $sql1 = "SELECT * FROM user WHERE email='$email'";
        $result1 = $connection->query($sql1);

        $flag = "true";

        if (empty($_POST["fullname"])) {
            $flag ="false";
            $error['fullname'] = "Bạn cần nhập tên";
        } elseif (strlen($fullname) > 25 ){
            $error['fullname'] = "Tên phải nhỏ hơn 25 kí tự";
        }

        if (empty($_POST["username"])) {
            $flag ="false";
            $error['username'] = "Bạn cần nhập tên đăng nhập";

        } elseif (!preg_match($parttern_username, $username)) {
            $flag ="false";
            $error["username"] = "Tên đăng nhập chưa đúng định dạng";
            $error_register["error"] = "Đăng ký thất bại";
        } elseif ($result->num_rows > 0) {
            $flag ="false";
            $error_register["error"] = "Đăng ký thất bại";
            $error["username"] = "Tên đăng nhập này đã tồn tại";
        }

        if (empty($_POST["email"])) {
            $flag ="false";
            $error['email'] = "Bạn cần nhập Email";
            $error_register["error"] = "Đăng ký thất bại";
        } elseif (!preg_match($parttern_email, $email)) {
            $flag ="false";
            $error["email"] = "Email chưa đúng định dạng";
            $error_register["error"] = "Đăng ký thất bại";
        } elseif ($result1->num_rows > 0) {
            $flag ="false";
            $error_register["error"] = "Đăng ký thất bại";
            $error["email"] = "Email này đã tồn tại";
        }

        if (!empty($_POST["password"])) {
            if (strlen($password) <= '8') {
                $flag ="false";
                $error["password"] = "Mật khẩu của bạn phải tối thiểu 8 ký tự!";
            } elseif (!preg_match("#[0-9]+#", $password)) {
                $flag ="false";
                $error["password"] = "Mật khẩu của bạn phải chứa ít nhất 1 số!";
            } elseif (!preg_match("#[A-Z]+#", $password)) {
                $flag ="false";
                $error["password"] = "Mật khẩu của bạn phải chứa ít nhất 1 chữ viết hoa!";
            } elseif (!preg_match("#[a-z]+#", $password)) {
                $flag ="false";
                $error["password"] = "Mật khẩu của bạn phải chứa ít nhất 1 chữ cái thường!";
            }
        }

        if($password != $repassword){
            $flag ="false";
            $error["password_not_equal"] = "Mật khẩu nhập lại phải khớp với mật khẩu";
        }

    if ($_POST['fullname'] != "" && $_POST['username'] != '' && $_POST['email'] != '' && $_POST['password'] != '' && $_POST['repassword'] != ""){
        $flag = "false";
        $error_register["error"] = "Đăng ký thất bại";
    }

        if($flag == "true"){
            $sql2 = "INSERT INTO user (fullname,username,email,password) VALUES ('$fullname','$username','$email','$password')";
            $connection->query($sql2);
            echo '<p style="color: red;font-size: 25px;text-align: center;font-weight: 800;">Đăng ký thành công</p>';
        }
    }