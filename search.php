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
        <li class="nav-link "><a href="index.php">Home</a></li>
        <li class="nav-link"><a href="friends.php">Posts</a></li>
        <!-- <li class="nav-link"><a href="photo.php">Family</a></li> -->
        <li class="nav-link"><a href="photo.php">Photos</a></li>
        <li class="nav-link"><a href="login.php">Login</a></li>
        <li class="nav-link"><a href="register.php">Register</a></li>
        <li class="nav-link"><a href="logout.php">Logout</a></li>
        <li class="nav-link active"><a href="search.php">Search</a></li>
      </ul><br>
      <div class="input-group">
      <form action="search.php"  method="POST">
      

        <input type="text" class="form-control" name="search_kw" placeholder="Search Blog.."
        value="<?php if(!empty($_POST['search_kw'])) echo $_POST['search_kw']; ?>">
        <!-- <span class="input-group-btn"> -->
          <!-- <button class="btn btn-default" type="button"> -->
            <!-- <span class="glyphicon glyphicon-search"></span> -->
            <input type="submit" name="search_btn" value="Tìm kiếm">

          <!-- </button> -->
        <!-- </span> -->
        </form>

      </div>
    </div>

    <div class="col-sm-9">
        <?php
            function search($keyword) {
            // $conn = new PDO('mysql:host=localhost;dbname=myblog', 'root', 'dangtran9399');
            $conn= new mysqli("localhost","root","dangtran9399","myblog") or die ("Unable to connect");

            $keyword = trim($keyword);
            $new_kw = str_replace("", "%' OR tiltle LIKE '%", $keyword); 
            //echo "<script>console.log('new_kw: '". $new_kw. ");</script>";
            $sql = "SELECT *
                    FROM post
                    WHERE tiltle LIKE '%$new_kw%'";
            $result = $conn->query($sql);
             if ($result && $result->num_rows > 0)
                {
                echo "<script>
                    document.getElementById('num_res').innerHTML = '".$result->num_rows." khóa học';
                    </script>";
                    while ($row = mysqli_fetch_array($result)) : ?>
                    <ul class="row">
                        <form action="edit-form.php?post_id=<?php echo $row['post_id']?>" id="form" method="POST">
                        <li class=" col-sm-3 col-xs-4  ">
                            <img class="img-responsive" class="img" src="<?=$row['image']?>">
                            <span><?php echo $row['content'];?><span> 
                                <br>
                            <button type="submit">Edit</button> 
                            <a href="delete.php?post_id=<?php echo $row['post_id']?> " onclick="return confirmDelete();" value= "1">Xóa</a>
                            <br>
                        </li>
                    </form>
                </ul>
                    <?php endwhile; ?>
                
                            
                    <?php }else
                    echo "
                    <script>
                        document.getElementById('num_res').innerHTML = '0 khóa học';
                    </script>";

                $conn->close();

            }

            if (isset($_POST['search_kw']))
                search($_POST['search_kw']);

        ?>

      
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
