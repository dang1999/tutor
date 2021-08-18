<?php
session_start();
  require ('DB_business.php');
 
  // Lớp đăng kí
  class Signup extends DB_business
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
  $signup->sign_up(array(
    'username' => '',
    'password' => '',
    'phone' => '',
    'email' => '',
    'lastname' => '',
    'firstname' => '',
    'address' => '',
));

?>
