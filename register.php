<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blog</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box}

    /* Full-width input fields */
    input[type=text], input[type=password] {
    width: 85%;
    padding: 15px;
    margin: 0 0 22px 0;
    display: block;
    /* border: none; */
    /* background: #f1f1f1; */
    }
    input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  /* border: 1px solid #f1f1f1; */
  /* margin-bottom: 25px; */
  width: 70%;
}

/* Set a style for all buttons */
 button { 
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  border: none;
  cursor: pointer;
  width: 85%;
  opacity: 0.9;
} 

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  /* width: 50%; */
}

/* Add padding to container elements */
.container-fluid {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
#avatar{
  width:85%;
}
 
  </style>
</head>


<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>John's Blog</h4>
      <ul class="nav nav-pills nav-stacked">
      <ul class="nav nav-pills nav-stacked">
        <li class="nav-link "><a href="index.php">Home</a></li>
        <li class="nav-link"><a href="friends.php">Post</a></li>
        <!-- <li class="nav-link"><a href="photo.php">Family</a></li> -->
        <li class="nav-link"><a href="photo.php">Photos</a></li>
        <li class="nav-link"><a href="login.php">Login</a></li>
        <li class="nav-link active"><a href="register.php">Register</a></li>
        <li class="nav-link "><a href="logout.php">Logout</a></li>
        <li class="nav-link "><a href="search.php">Search</a></li>

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
      
    <form action="check_signup.php" method="post" style="border:1px solid #ccc" enctype="multipart/form-data">
  <div class="container-fluid">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <div class="col-sm-6">
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="repassword" required>

    <label for="psw-repeat"><b>Phone</b></label>
    <input type="text" placeholder="Enter Phone" name="phone" required>
    </div>
    <div class="col-sm-6">
    <label for="psw-repeat"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lastname" required>

    <label for="psw-repeat"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="firstname" required>

    <label for="psw-repeat"><b>Avatar</b></label>
    <input type="file" id="avatar" class="form-control" name="avatar">    

    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    </div>
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="submit" class="signupbtn" name="signup" >Sign Up</button>
    </div>
  </div>
</form>
  </div>
  </div>
</div>

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>

</body>
</html>
