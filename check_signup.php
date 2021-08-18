<?php
   require ('DB_user.php');
   
 // Lớp đăng kí
 class Signup extends DB_user
 {
     function __construct() 
     {
         // Khai báo tên bảng
         $this->_table_name = 'user';
          
         // Khai báo tên field id
         $this->_key = 'post_id';
          
         // Gọi hàm khởi tạo cha
         parent::__construct();
     }
 }
 $signup = new Signup();

 function GUID() {
    return strtoupper(bin2hex(openssl_random_pseudo_bytes(10)));}

    if(isset($_POST["signup"])){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $password = $_POST["password"];
    $avatar = isset($_FILES["avatar"]["name"]) ? $_FILES["avatar"]["name"]: "";
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $repassword = $_POST["repassword"];
    }

    $signup->sign_up(array(
   'username' => $_POST["username"],
   'password' => $_POST["password"],
   'repassword' => $_POST["repassword"],
   'phone' => $_POST["phone"],
   'lastname' => $_POST["lastname"],
   'firstname' => $_POST["firstname"],
   'avatar' => $_FILES["avatar"]["name"],
    ));
    // header('location:login.php');

?>