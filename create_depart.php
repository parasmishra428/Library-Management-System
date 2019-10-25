<?php 
$title = 'Create department';
require "navbar.php";
?>
<?php 
if (isset($_POST['btnSave'])) {
	$err = [];
	//name check
			if (isset($_POST['departmentID']) && !empty($_POST['departmentID'])) {
		$departmentID =  $_POST['departmentID']; 
	} else {
		$err['departmentID'] = 'Enter departmentID';
	}

	

	if (isset($_POST['departmentName']) && !empty($_POST['departmentName'])) {
		$departmentName =  $_POST['departmentName']; 
	} else {
		$err['departmentName'] = 'Enter departmentName';
	}

	



	
	if (count($err) == 0) {
		require "connection.php";
		//make query to insert data
		$sql = "insert into department(departmentID,departmentName) values ('$departmentID','$departmentName')";
		//execute query
		$db->query($sql);
		//check data insert status
		if ($db->affected_rows == 1 ) {
			echo "Insert Success";
		} else {
			echo "Insert Failed";
		}
	}
}

 ?>
 <div class="container">
 	
 			<div class="card mt-5">
 		<div class="card-header">
 			<?php echo $title ?>
 				
 			</div>
 		<div class="card-body">
 			<div class="row">
 			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

 		<label for="departmentID">departmentID</label>
	 	 <input type="text" name="departmentID" class="form-control" id="departmentID" placeholder="Enter departmentID" >
	 	 <?php 
	 	 	if (isset($err['departmentID'])) {
	 	 		echo $err['departmentID'];
	 	 	}
	 	  ?>
	 	

	 	 <label for="departmentName">departmentName</label>
	 	 <input type="text" name="departmentName" class="form-control" id="departmentName" placeholder="Enter departmentName" >
	 	 <?php 
	 	 	if (isset($err['departmentName'])) {
	 	 		echo $err['departmentName'];
	 	 	}
	 	  ?>
	 	
	 	  
	 	 <br>
	 	 <input type="submit" name="btnSave" class="btn btn-success" value="Save Category">
	 </form>
 	</div>
 		</div>
 		</div>
 		<div class="card-footer"></div>
 	</div>
 		
 	
 </div>