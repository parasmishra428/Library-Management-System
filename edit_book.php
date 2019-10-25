<?php 
$title = 'Edit Book';
require "navbar.php";
$id = $_GET['bid'];
?>
<?php 
if (isset($_POST['btnUpdate'])) {
	$err = [];
	if (isset($_POST['name']) && !empty($_POST['name'])) {
		$name =  $_POST['name']; 
	} else {
		$err['name'] = 'Enter name';
	}
	if (isset($_POST['authors']) && !empty($_POST['authors'])) {
		$authors =  $_POST['authors']; 
	} else {
		$err['authors'] = 'Enter authors';
	}
	if (isset($_POST['edition']) && !empty($_POST['edition'])) {
		$edition =  $_POST['edition']; 
	} else {
		$err['edition'] = 'Enter edition';
	}
	if (isset($_POST['status']) && !empty($_POST['status'])) {
		$status =  $_POST['status']; 
	} else {
		$err['status'] = 'Enter status';
	}
	if (isset($_POST['quantity']) && !empty($_POST['quantity'])) {
		$quantity =  $_POST['quantity']; 
	}
	 else {
		$err['quantity'] = 'Enter quantity';
	}
	if (isset($_POST['department']) && !empty($_POST['department'])) {
		$department =  $_POST['department']; 
	} else {
		$err['department'] = 'Enter department';
	}

	if (count($err) == 0) {
		require "connection.php";
		 $sql = "update books set name='$name',authors='$authors',edition='$edition',status='$status',quantity='$quantity' where bid=$id ";
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
$sql = "select *  from books where bid=$id";
$result = mysqli_query($db, $sql);
$book = $result->fetch_assoc();
 ?>
 <div class="container">	
 		<div class="card mt-5">
 		<div class="card-header">
 			<?php echo $title ?>
 				
     	</div>
 		<div class="card-body">
 				<?php require_once "alert_message.php"; ?>			
 		<div class="row">
 		<form action="<?php echo $_SERVER['PHP_SELF'] ?>?bid=<?php echo $id ?>" method="post">
	 	 <label for="name">Name</label>
	 	 <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="<?php echo $book['name'] ?>" >
	 	 <?php 
	 	 	if (isset($err['name'])) {
	 	 		echo $err['name'];
	 	 	}
	 	  ?>
	 	 <br/>
	 	  <label for="authors">Authors</label>
	 	 <input type="text" name="authors" class="form-control" id="authors" placeholder="Enter authors" value="<?php echo $book['authors'] ?>" >
	 	  <?php 
	 	 	if (isset($err['authors'])) {
	 	 		echo $err['authors'];
	 	 	}
	 	  ?>
	 	    <label for="edition">Edition</label>
	 	 <input type="text" name="edition" class="form-control" id="edition" placeholder="Enter edition" value="<?php echo $book['edition'] ?>" >
	 	  <?php 
	 	 	if (isset($err['edition'])) {
	 	 		echo $err['edition'];
	 	 	}
	 	  ?>
	 	 
	 	   <label for="status">Status</label>
	 	 <input type="text" name="status" class="form-control" id="status" placeholder="Enter status" value="<?php echo $book['status'] ?>" >
	 	  <?php 
	 	 	if (isset($err['status'])) {
	 	 		echo $err['status'];
	 	 	}
	 	  ?>
	 	 
	 	 <label for="quantity">Quantity</label>
	 	 <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter quantity" value="<?php echo $book['quantity'] ?>" >
	 	  <?php 
	 	 	if (isset($err['quantity'])) {
	 	 		echo $err['quantity'];
	 	 	}
	 	  ?>
	 	 
	 	  	 	 
	 	 <br>
	 	 <input type="submit" name="btnUpdate" class="btn btn-success" value="Update Book">
	 </form>
 	</div>
 	</div>
 	</div>
 
    </div>
</div>
