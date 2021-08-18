<?php
   require ('DB_user.php');
   
 // Lớp đăng kí
 class Signin extends DB_user
 {
     function __construct() 
     {
         // Khai báo tên bảng
         $this->_table_name = 'post';
          
         // Khai báo tên field id
         $this->_key = 'post_id';
          
         // Gọi hàm khởi tạo cha
         parent::__construct();
     }
 }
 $edit = new Signin();
 session_start();
 $conn= new mysqli("localhost","root","","myblog") or die ("Unable to connect");

 if(isset($_POST["edit"])){
     $post_id = $_GET["postid"];
    $tiltle = $_POST["tiltle"];
    $content = $_POST["content"];
    $image= $_POST["image"];

    $where="postid=$post_id";
    $data=array(
   'tiltle' => $tiltle,
   'content' => $content,
   'image' => $image
    );
    
    $edit->edit_post($data,$where);
    header('location:login.php');

        
        
    }

    
  

 ?>