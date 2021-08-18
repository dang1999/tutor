<?php
   require ('DB_user.php');
   require ('conn.php');
   
 // Lớp đăng kí
 class Signin extends DB_user
 {
     function __construct() 
     {
         // Khai báo tên bảng
         $this->_table_name = 'user';
          
         // Khai báo tên field id
         $this->_key = 'postid';
          
         // Gọi hàm khởi tạo cha
         parent::__construct();
     }
 }
 $signin = new Signin();
 session_start();

 if(isset($_POST["signin"]))
   {
        $password = $_POST["password"];
        $username = $_POST["username"];
        $checkExist = "SELECT * FROM user WHERE username='{$username}'";
        $result = $conn->query($checkExist);
        if($result->num_rows>0){
            while($q_result=$result->fetch_assoc()){
                if($q_result['password']==$password)
                {         
                    echo "Dang nhap thanh cong";
                    $_SESSION['password'] = $v['password'];
                    $_SESSION['phone'] = $v['phone'];
                    $_SESSION['firstname'] = $v['firstname'];
                    $_SESSION['lastname'] = $v['lastname'];
                    $_SESSION['username'] = $v['username'];
                    $_SESSION['avatar'] = $v['avatar'];
                    header('location:index.php');

                }
                else    
                {
                    $mess="Bạn đã nhập sai tài khoản";
                    header('location:login.php?mess='.$mess);
        
                }
            } 
        
        } 
    }

?>