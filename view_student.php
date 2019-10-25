<?php 
$title = 'View Details';
require "navbar.php";

?>
<?php 
	if (!isset($_GET['sname'])) {
		header('location:student.php');
	}else {
		$sname = $_GET['sname'];
		print_r($sname);
	}
	require "connection.php";
	echo $sql = "select * from student where username= '$sname' ";
	$result = $db->query($sql);
	$student = $result->fetch_assoc();
 ?>
 <div class="container">
 	
 		<div class="card mt-5">
 		<div class="card-header">
 			<?php echo "<h2>STUDNET DETAILS</h2>" ?>
 		</div>
 		<div class="card-body">
 			<div class="row">
 			<div class="col-md-12">
 			<div class="table-responsive">
 			<table class="table table-bordered table-hover table-striped ">
 				<tr>
 					<th>First Name</th>
 					<td><?php echo $student['first'] ?></td>
 				</tr>
 				<tr>
 					<th>Last Name</th>
 					<td><?php echo $student['last'] ?></td>
 				</tr>
 				<tr>
 					<th>Username</th>
 					<td><?php echo $student['username'] ?></td>
 				</tr>
 				<tr>
 					<th>Email</th>
 					<td><?php echo $student['email'] ?></td>
 				</tr>
 				<tr>
 					<th>Contact Number</th>
 					<td><?php echo $student['contact'] ?></td>
 				</tr>
 				
 			</table>
 			</div>
 		</div>
	 		
 	</div>
 		</div>
 		</div>
 		<div class="card-footer"></div>
 	</div>
 		
 	
 </div>

