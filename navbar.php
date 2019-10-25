<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>
  </title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>

      <nav class="navbar navbar-inverse">
      <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand active">ONLINE LIBRARY MANAGEMENT SYSTEM</a>
          </div>
          <ul class="nav navbar-nav">
           
          
            <li><a href="feedback.php">FEEDBACK</a></li>
          </ul>
          <?php
            if(isset($_SESSION['login_user']))
            {?>
                <ul class="nav navbar-nav">
                  
                  <li><a href="profile.php">PROFILE</a></li>
                 <li><a href="books.php">BOOKS</a></li>
                  <li><a href="student.php">
                    STUDENT-INFORMATION
                  </a></li>
                  <li><a href="fine.php">FINES</a></li>
                </ul>
                 

                <ul class="nav navbar-nav navbar-right">
                  <li><a href="profile.php">
                    <div style="color: white">
                          <li><a href="registration.php"><span  class="glyphicon glyphicon-user" style="margin-top: 16px;" > ADD-ADMIN</span></a></li>
                     <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" style="margin-top: 16px;"> LOGOUT</span></a></li>
                    
                    </div>
                  </a></li>
                
                  
                </ul>
              <?php
            }
            else
            {   ?>
              <ul class="nav navbar-nav navbar-right">

                <li><a href="index.php"><span class="glyphicon glyphicon-log-in"> LOGIN</span></a></li>
                
             
              </ul>
                <?php
            }

          ?>

      </div>
    </nav>



</body>
</html>