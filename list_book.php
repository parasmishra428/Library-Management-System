<?php 
$title = 'List Books';
require "navbar.php";
?>
<?php 
	require "connection.php";
	//sql query to select all  categories from database
	$sql = "select bid,name from books";
	$result = $db->query($sql);
	$data = [];
	if ($result->num_rows > 0) {
		while ($book = $result->fetch_assoc()) {
			array_push($data, $book);
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>

	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: white;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}

	</style>

</head>
<body>
	<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>

 <div class="h"> <a href="add.php">Add Books</a> </div> 
  <div class="h"> <a href="request.php">Book Request</a></div>
  <div class="h"> <a href="issue_info.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
	<!--___________________search bar________________________-->





 <nav class="navbar navbar-expand-lg navbar-light bg ">
   <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
   aria-expanded="false" aria-label="Toggle navigation"></button>
   <div class="collapse navbar-collapse" id="collapsibleNavId">
    <form class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control mr-sm-2" type="text" placeholder="Search"name = "search">
      <button class="btn btn-primary my-2 my-sm-0" type="submit" name = "submit">Search</button>
    </form>
  </div>
</nav>
 <div class="container">
 			<div class="card mt-5">
 			<div class="card-header"><?php echo $title ?></div>
 			<div class="card-body">
 			<div class="row">
 			<div class="col-md-12">
 			<div class="table-responsive">
 			<table class="table table-bordered table-hover table-striped ">
 				<thead>
 					<tr class="bg-success">
 						<th>Bid</th>
 						<th>Name</th>
 						<th>Action</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php foreach($data as $d){ ?>
	 					<tr>
	 						<td><?php echo $d['bid']?></td>
	 						<td><?php echo $d['name'] ?></td>							
	 						<td>
	 							<a class="btn btn-info" href="view_books.php?bid=<?php echo $d['bid'] ?>">View Details</a>

	 							<a class="btn btn-danger" onclick="return confirm ('are you sure to delete?')" href="delete_book.php?bid=<?php echo $d['bid'] ?>">Delete</a>

	 							<a class="btn btn-warning"  href="edit_book.php?bid=<?php echo $d['bid'] ?>">Edit</a>

	 						</td>
	 					</tr>
 					<?php } ?>
 				</tbody>
 			</table>
 		</div>
 		</div>	
 		</div>
 		</div>
 		</div>
 		<div class="card-footer"><?php echo $title ?></div>
 </div>
 <?php 
 if(isset($_POST['submit'])){
	$q="SELECT * from books where name like '%$_POST[search]%' ";
	$res = $db->query($q);
	if(mysqli_num_rows($res) == 0)
	{
		echo "Sorry! No book found. Try searching again.";
	}
	else{
		 
			echo "Books are available";
			}
		}
 ?>
