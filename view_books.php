<?php 
$title = 'View Books';
require "navbar.php";

?>
<?php 


	


	if (!isset($_GET['bid'])) {
		header('location:list_book.php');
	}else {
		$id = $_GET['bid'];
		print_r($id);
	}
	require "connection.php";
	$sql = "select * from books where bid=$id ";
	$result = $db->query($sql);
	$book = $result->fetch_assoc();
 ?>
 <div class="container">
 	
 		<div class="card mt-5">
 		<div class="card-header">
 			<?php echo "<h2>BOOKS DETAILS</h2>" ?>
 		</div>
 		<div class="card-body">
 			<div class="row">
 			<div class="col-md-12">
 			<div class="table-responsive">
 			<table class="table table-bordered table-hover table-striped ">
 				<tr>
 					<th>Name</th>
 					<td><?php echo $book['name'] ?></td>
 				</tr>
 				<tr>
 					<th>Author</th>
 					<td><?php echo $book['authors'] ?></td>
 				</tr>
 				<tr>
 					<th>Edition</th>
 					<td><?php echo $book['edition'] ?></td>
 				</tr>
 				<tr>
 					<th>Status</th>
 					<td><?php echo $book['status'] ?></td>
 				</tr>
 				<tr>
 					<th>Quantity</th>
 					<td><?php echo $book['quantity'] ?></td>
 				</tr>
 				<!-- <tr>
 					<th>Department ID</th>
 					<td><?php echo $book['departmentID'] ?></td>
 				</tr> -->
 				
 			</table>
 			</div>
 		</div>
	 		
 	</div>
 		</div>
 		</div>
 		<div class="card-footer"></div>
 	</div>
 		
 	
 </div>

