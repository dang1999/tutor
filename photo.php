<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Photo Gallery</title>
    <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
    ul {
        list-style-type: none;
    }
    img {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width: 150px;
        }

        img:hover {
  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}
    </style>
</head>
<?php
  require ('DB_business.php');
  session_start();

  // Lớp bài viết
  class Post extends DB_business
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
   
  // Khởi tạo lớp khách hàng
  $post = new Post();
  $row = $post->get_list('select * from post');
    if(!isset($_SESSION["user_id"])){
    header('location:login.php');
}
?>

<body>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4><?php echo $_SESSION['lastname'] ;?> <?php echo $_SESSION['firstname'];?>'s Blog</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="nav-link"><a href="index.php">Home</a></li>
        <li class="nav-link"><a href="friends.php">Post</a></li>
        <!-- <li class="nav-link"><a href="photo.php">Family</a></li> -->
        <li class="nav-link active"><a href="photo.php">Photos</a></li>
        <li class="nav-link"><a href="login.php">Login</a></li>
        <li class="nav-link"><a href="register.php">Register</a></li>
        <li class="nav-link "><a href="logout.php">Logout</a></li>
        <li class="nav-link"><a href="search.php">Search</a></li>

      </ul><br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search Blog..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>
    </div>

    <div class="col-sm-9">
    <h2>Ảnh bài đăng</h2>
    <ul class="row">
    <?php foreach($row as $k => $v):?>
        <li class=" col-sm-3 col-xs-4  ">
            <img class="img-responsive" class="img" src="<?=$v['image']?>">
            <?php echo $v['content'];?>
        </li>
        <?php
        // echo $v['image'];
         endforeach;?>
    </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="container-fluid">
  <p>Footer Text</p>
</footer>
</body>

</html>
