<?php

class Database{

    public static $connection = null;


    public function __construct()
    {

        if(self::$connection){
            return self::$connection;
        }

        $this->connect();
        return self::$connection;
    }

    public function connect(){
        $severName = "localhost";
        $username = "root";
        $password = "";
        $dbName = "simple_shop";

        self::$connection = new mysqli($severName,$username,$password,$dbName);

        if(self::$connection->connect_error){
            die("Không thể kết nối đến cơ sở dữ liệu");
        }
    }

    public function disconnect(){
        if(self::$connection){
            self::$connection->close();
        }
    }

    public function runQuery($sql) {
        $data = array();
        $result = self::$connection->query($sql);

        if($result->num_rows > 0){  //Nếu $result->num_rows > 0 ==>Có dữ liệu
            while($row = $result->fetch_assoc()){ //mỗi lần lặp sẽ lấy ra 1 biến $row
                //fetch_assoc() lấy ra 1 mảng (phải tạo ra 1 mảng để chứa dữ liệu VÍ dụ như mảng $data ở trên)
                $data[] = $row;
            }
            return $data;
        }
    }


}