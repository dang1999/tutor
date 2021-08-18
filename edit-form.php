<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css"> <!-- load bootstrap via CDN -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> <!-- load jquery via CDN -->

  <script src="js.js"></script> 

  

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
    * {
      /* font-size: 15px; */
    }
    
  </style>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION["user_id"])){
  header('location:login.php');
}

?>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4><?php echo $_SESSION['lastname'] ;?> <?php echo $_SESSION['firstname'];?>'s Blog</h4>
      <ul class="nav nav-pills nav-stacked">
      <ul class="nav nav-pills nav-stacked">
        <li class="nav-link active"><a href="index.php">Home</a></li>
        <li class="nav-link"><a href="friends.php">Posts</a></li>
        <!-- <li class="nav-link"><a href="photo.php">Family</a></li> -->
        <li class="nav-link"><a href="photo.php">Photos</a></li>
        <li class="nav-link"><a href="login.php">Login</a></li>
        <li class="nav-link"><a href="register.php">Register</a></li>
        <li class="nav-link"><a href="search.php">Logout</a></li>
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
    <?php 
    require ('DB_business.php');

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
    $post_id = $_GET["post_id"];
    $row = $post->get_row("select * from post where post_id='$post_id' ");

    ?>
    
    <div class="col-sm-9">
    <form action="edit.php?post_id=<?php echo $post_id?>" id="form" method="POST">

    
        <!-- EMAIL -->
        <div id="tiltle-group" class="form-group">
            <label for="email">Title</label>
            <input type="text" class="form-control" value="<?php echo $row['tiltle']?>" name="tiltle" placeholder="rudd@avengers.com">
            <!-- errors will go here -->
        </div>

        <!-- SUPERHERO ALIAS -->
        <div id="image-group" class="form-group">
            <label for="superheroAlias">Image</label>
            <input type="file" class="form-control" id="image" value="<?=$row['image']?>" name="image"  placeholder="Ant Man">

            <!-- errors will go here -->
        </div>
        <div id="content-group" class="form-group">
        <textarea id="w3review" name="content" rows="4" placeholder="Type something" cols="89"><?php echo $row['content']?></textarea>
        </div>
        <br><br>
        <!-- <input type="submit" class="btn btn-success"><span class="fa fa-arrow-right"></span> -->
        <button type="submit" value ="import" name="edit" class="btn btn-success">Submit <span class="fa fa-arrow-right"></span></button>

        </form>
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>

<!-- <div class="row" data-widget="tab-slider">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
    </div>
  </div> -->
  <!-- <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">Home Panel</div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">Profile Panel</div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">Messages Panel</div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">Settings Panel</div>
    </div>
  </div>
</div> -->
</html>
