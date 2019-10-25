<?php 
$title = 'Edit Student';
require "navbar.php";
$uname = $_GET['sname'];
print_r($uname);
echo "<br>";
?>
<?php 
if (isset($_POST['btnUpdate'])) {
	$err = [];
	if (isset($_POST['first']) && !empty($_POST['first'])) {
		$first =  $_POST['first']; 
	} else {
		$err['first'] = 'Enter First Name';
	}
	if (isset($_POST['last']) && !empty($_POST['last'])) {
		$last =  $_POST['last']; 
	} else {
		$err['last'] = 'Enter Last Name';
	}
	if (isset($_POST['username']) && !empty($_POST['username'])) {
		$username=  $_POST['username']; 
	} else {
		$err['username'] = 'Enter Username';
	}
	if (isset($_POST['Password']) && !empty($_POST['Password'])) {
		$Password =  $_POST['Password']; 
	} else {
		$err['Password'] = 'Enter Password';
	}
	if (isset($_POST['roll']) && !empty($_POST['roll'])) {
		$roll =  $_POST['roll']; 
	}
	 else {
		$err['roll'] = 'Enter roll';
	}
	if (isset($_POST['email']) && !empty($_POST['email'])) {
		$email =  $_POST['email']; 
	} else {
		$err['email'] = 'Enter email';
	}
	if (isset($_POST['contact']) && !empty($_POST['contact'])) {
		$contact =  $_POST['contact']; 
	} else {
		$err['contact'] = 'Enter contact';
	}

	if (count($err) == 0) {
		require "connection.php";
		echo $sql = "update student set first='$first',last='$last',username='$username',Password='$Password',roll='$roll',email = '$email',contact = '$contact' where username= '$uname' ";
		//execute query
		mysqli_query($db,$sql);
		//check data insert status
		if ($db->affected_rows == 1) {
			$success =  "Update Success";
		} else {
			$failed  =  "Update Failed";
		}
	}
}
 ?>
<?php 
require_once "connection.php";
$sql = "select *  from student where username= '$uname' ";
$result = mysqli_query($db, $sql);
$student = $result->fetch_assoc();
 ?>
 <div class="container">	
 		<div class="card mt-5">
 		<div class="card-header">
 			<?php echo $title ?>
 				
     	</div>
 		<div class="card-body">
 				<?php require_once "alert_message.php"; ?>			
 		<div class="row">
 		<form action="<?php echo $_SERVER['PHP_SELF'] ?>? uname=<?php echo $uname ?>" method="post">
	 	 <label for="first">First name</label>
	 	 <input type="text" name="first" class="form-control" id="name" placeholder="Enter first name" value="<?php echo $student['first'] ?>" >
	 	 <?php 
	 	 	if (isset($err['first'])) {
	 	 		echo $err['first'];
	 	 	}
	 	  ?>
	 	 <br/>
	 	  <label for="last">Last Name</label>
	 	 <input type="text" name="last" class="form-control" id="last" placeholder="Enter last name" value="<?php echo $student['last'] ?>" >
	 	  <?php 
	 	 	if (isset($err['last'])) {
	 	 		echo $err['last'];
	 	 	}
	 	  ?>
	 	    <label for="username">Username</label>
	 	 <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" value="<?php echo $student['username'] ?>" >
	 	  <?php 
	 	 	if (isset($err['username'])) {
	 	 		echo $err['username'];
	 	 	}
	 	  ?>
	 	 
	 	   <label for="Password">Password</label>
	 	 <input type="Password" name="Password" class="form-control" id="Password" placeholder="Enter Password" value="<?php echo $student['password'] ?>" >
	 	  <?php 
	 	 	if (isset($err['Password'])) {
	 	 		echo $err['Password'];
	 	 	}
	 	  ?>
	 	 
	 	 <label for="roll">Roll NO.</label>
	 	 <input type="number" name="roll" class="form-control" id="roll" placeholder="Enter roll" value="<?php echo $student['roll'] ?>" >
	 	  <?php 
	 	 	if (isset($err['roll'])) {
	 	 		echo $err['roll'];
	 	 	}
	 	  ?>
	 	  	 <label for="email">Email</label>
	 	 <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="<?php echo $student['email'] ?>" >
	 	  <?php 
	 	 	if (isset($err['email'])) {
	 	 		echo $err['email'];
	 	 	}
	 	  ?>
	 	  	 <label for="contact">Contact</label>
	 	 <input type="number" name="contact" class="form-control" id="contact" placeholder="Enter contact" value="<?php echo $student['contact'] ?>" >
	 	  <?php 
	 	 	if (isset($err['contact'])) {
	 	 		echo $err['contact'];
	 	 	}
	 	  ?>
	 	 
	 	  	 	 
	 	 <br>
	 	 <input type="submit" name="btnUpdate" class="btn btn-success" value="Update student">
	 </form>
 	</div>
 	</div>
 	</div>
 
    </div>
</div>
