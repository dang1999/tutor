<?php
require ("DB_driver.php");
 
// $signin = new DB_driver();

class DB_user extends DB_driver 
{
    // Tên Table
    protected $_table_name = '';
     
    // Tên Khóa Chính
    protected $_key = '';
     
    // Hàm Khởi Tạo
    function __construct() {
        parent::connect();
    }
     
    // Hàm ngắt kết nối
    function __destruct() {
        parent::dis_connect();
    }
    // Hàm đăng kí
    function sign_up($data){
        return parent::insert($this->_table_name, $data);
    }

    function edit_post($data,$where){
        return parent::update($this->_table_name, $data,$where);
    }

   
    // Hàm đăng nhập

//    public function sign_in($email,$password,$result){
   
//         session_start();
//         if($result){
//         if($result->num_rows>0){
//             while($q_result=$result->fetch_assoc()){
//             if($q_result['password']==$password ){
//              echo "Dang nhap thanh cong";
//              $_SESSION['userid'] = $q_result['userid'];
//              $_SESSION['password'] = $q_result['password'];
//              $_SESSION['username'] = $q_result['username'];
//              $_SESSION['firstname'] = $q_result['firstname'];
//              $_SESSION['lastname'] = $q_result['lastname'];
//              $_SESSION['email'] = $q_result['email'];
//              $_SESSION['phone'] = $q_result['phone'];
//              $_SESSION['address'] = $q_result['address'];
//              $_SESSION['avatar'] = $q_result['avatar'];
//             //  $_SESSION['birthhday'] = $q_result['birthhday'];
//              header('location:homepage.php');
           

//             }
//         } 
        
//         } else{
//             echo "Ban da nhap sai mat khau";     

//         }

//     }
    
//    }
}
  ?>