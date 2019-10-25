<?php
$title= 'registration';
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

?>

 <?php


      if(isset($_POST['submit']))
      {
        $err = [];
              if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id =   validateUserData($_POST['id']); 
  } else {
    $err['id'] = 'Enter id ';
  }

        if (isset($_POST['first']) && !empty($_POST['first'])) {
    $first =   validateUserData($_POST['first']); 
  } else {
    $err['first'] = 'Enter first name';
  }

   if (isset($_POST['last']) && !empty($_POST['last'])) {
    $last =   validateUserData($_POST['last']); 
  } else {
    $err['last'] = 'Enter last name';
  }




 //form validation for username
    if (isset($_POST['username']) && !empty($_POST['username']) && 
      trim($_POST['username']) != '')  {
      //get username and trim username : remove white space from start and end 
      $username =  validateUserData($_POST['username']);
      //check lenght of string
      if (strlen($username) >= 8) {
        
      } else {
        $err['username'] =  'Username must be minimum 8 character';
      }
      
    } else {
      $err['username'] =  'Enter Username';
    }


    if (isset($_POST['password']) && !empty($_POST['password']) && 
      trim($_POST['password']) != '')  {
      //get username and trim username : remove white space from start and end 
      $password =  validateUserData($_POST['password']);
      //check lenght of string
      if (strlen($password) >= 8) {
        
      } else {
        $err['password'] =  'username must be minimum 8 character';
      }
      
    } else {
      $err['password'] =  'Enter username';
    }

 


if (isset($_POST['email']) && !empty($_POST['email']))  {

      $email =  validateUserData($_POST['email']);

        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
          $err['email'] =  'Enter Valid Email';
        } 
      } else {
        $err['email'] =  'Enter Email';
      }


        if (isset($_POST['phone']) && !empty($_POST['phone']) && is_numeric($_POST['phone']))  {
      $phone =  $_POST['phone'];
      if (strlen($phone) < 10 ) {
        $err['phone'] =  'Enter phone minimum 10 digit';
      }
    } else {
      $err['phone'] =  'Enter phone';
    }
  



        if (isset($_FILES['photo']['error']) && $_FILES['photo']['error'] == 0) {
    //file size validation
    if ($_FILES['photo']['size'] < 1048576) {
      $types = ['image/jpeg','image/gif','image/png','image/jpg'];
      $image_name = uniqid() . '_' . $_FILES['photo']['name'];
      if (in_array($_FILES['photo']['type'], $types)) {
        //move file to your folder
        if(move_uploaded_file($_FILES['photo']['tmp_name'], 
          'images/' . $image_name)){
        }else {
          $err['photo'] = 'File Upload Failed!!';
        }
      } else {
        $err['photo'] = 'File type not allowed';
      }
    } else {
      $err['photo'] = 'File size exceed, 1 MB allowed';
    }
  }else {
    $err['photo'] = 'File Upload Error';
  }

if (count($err) == 0) {
          

          $sql= "insert into admin (first,last,username,password,email,contact,pic)values('$first','$last','$username','$password','$email','$phone','$image_name')";

          $db->query($sql);

        if ($db->affected_rows == 1)         ?>
          <script type="text/javascript">
           alert("Registration successful");
          </script>
        <?php
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("registration failed.");
            </script>
          <?php

        }

      }
      

    ?>

<!DOCTYPE html>
<html>
<head>

  <title>admin Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

  <style type="text/css">
    section
    {
      margin-top: -20px;
    }
  </style>   
</head>
<body>

<section>
  <div class="reg_img">

    <div class="box2">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> &nbsp &nbsp &nbsp  Library Management System</h1>
        <h1 style="text-align: center; font-size: 25px;">Admin Registration Form</h1>



      
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" 
          method="post" enctype="multipart/form-data">
        <div class="login">

            <input class="form-control" type="text" name="id" placeholder="enter id"> <br>
               <?php 
            if (isset($err['id'])) {
              echo $err['id'];
            }
            ?>
  
          <input class="form-control" type="text" name="first" placeholder="First Name"> <br>
               <?php 
            if (isset($err['first'])) {
              echo $err['first'];
            }
            ?>
  

          <input class="form-control" type="text" name="last" placeholder="Last Name"> <br>
         
               <?php 
            if (isset($err['last'])) {
              echo $err['last'];
            }
            ?>
          <input class="form-control" type="text" name="username" placeholder="Username"> <br>
   

               <?php 
            if (isset($err['username'])) {
              echo $err['username'];
            }
            ?>
          <input class="form-control" type="password" name="password" placeholder="Password"> <br>


               <?php 
            if (isset($err['password'])) {
              echo $err['password'];
            }
            ?>
     
          <input class="form-control" type="text" name="email" placeholder="Email" ><br>

               <?php 
            if (isset($err['email'])) {
              echo $err['email'];
            }
            ?>

          <input class="form-control" type="text" name="phone" placeholder="Phone No"><br>

               <?php 
            if (isset($err['phone'])) {
              echo $err['phone'];
            }
            ?>
          <input class="btn btn-default" style="display:block;width: 100%;height: 34px;"value="upload image" onclick="document.getElementById('image').click()"></input>
          <input type="file" style="display:none;" name="photo" class="form-control" id="image" placeholder="Enter image" >
      
        <?php 
            if (isset($err['photo'])) {
              echo $err['photo'];
            }
            ?><br>
          <input class="btn btn-danger" style="display:block;width: 100%;height: 34px;" type="submit" name="submit" value="Sign Up" style="color: black; width: 70px; height: 30px"> </div>

          
      </form>
     
    </div>
  </div>
</section>

   

</body>
</html>