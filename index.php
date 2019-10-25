<?php
$title='login page';
  include "connection.php";
  include "navbar.php";
function validateUserData($value) {


  //remove space
  $value = trim($value);
  //remove back slash from string
  $value = stripslashes($value);
  //encode special character
  $value = htmlspecialchars($value);
  //escape special character before inserting into database table

  //return value
  return $value;
}



    if(isset($_POST['submit']))
    {
           $err = [];
    if (isset($_POST['username']) && !empty($_POST['username'])) {
      $username =   validateUserData($_POST['username']);

    } else {
      $err['username']  = "Enter Username";
    }

    if (isset($_POST['password']) && !empty($_POST['password'])) {
      $password =   validateUserData($_POST['password']);
    } else {
      $err['password'] =  "Enter password";
    }

    
    if (count($err) == 0) {
    
      require_once "connection.php";

      //query to select data form database with user provided username and password
      $sql = "select * from admin where username='$username' and password='$password'";
      //execute
      $result =$db->query($sql);

      if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        //print_r($user);
        session_start();
        //store username into session
      $_SESSION['login_user'] = $_POST['username']; 
        $_SESSION['pic']= $user['pic'];
        //check remember me button
      
        header("location:profile.php");
      } else {
        $msg =  "Login failed";
      }
    }
}
 ?>



<!DOCTYPE html>
<html>
<head>

  <title>admin Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
  </style>   
</head>
<body>

<section>
  <div class="log_img">

   <br>
    <div class="box1">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Library Management System</h1>
        <h1 style="text-align: center; font-size: 25px;">Admin Login Form</h1><br>

          <?php if(isset($_GET['msg']) && $_GET['msg'] == 1){ ?>
      <p class="err_message"><i>please login to access dashboard<i></p>
    <?php }  ?>

    <?php if(isset($msg)){ ?>
      <p class="alert alert-danger"><?php echo $msg ?></p>
    <?php }  ?>

      <form  name="login" action="" method="post">
        
        <div class="login">
          <input class="form-control" type="text" name="username" placeholder="Username" > <br>
           <?php if (isset($err['username'])) { ?>
             <span class="text-danger"><?php echo $err['username']; ?></span>
           <?php } ?>
          <input class="form-control" type="password" name="password" placeholder="Password" > <br>
           <?php if (isset($err['password'])) { ?>
             <span class="text-danger"><?php echo $err['password']; ?></span>
           <?php } ?><br>
          <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: black; width: 70px; height: 30px"> 
        </div>
      
      <p style="color: white; padding-left: 15px;">
        <br><br>
        <a style="color:yellow; float: center; padding-left: 130px;"  href="update_password.php">Forgot password?</a> 
       
      </p>
        <small class="text-muted">
         <?php if(isset($err['msssage'])) echo $err['message']; ?>
       </small>
    </form>
    </div>
  </div>
</section>



</body>
</html>