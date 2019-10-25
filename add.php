<?php 
$title = '<h2>add book</h2> ';
require "navbar.php";
function validateUserData($value)  {

  require_once "connection.php";
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
require "connection.php";
   $sql = "select departmentID,departmentName from department  ";
   $result = $db->query($sql);
   $data = [];
   if ($result->num_rows > 0) {
     while ($category = $result->fetch_assoc()) {
       array_push($data, $category);
     }
   }

if (isset($_POST['btnSave'])) {
  $err = [];
  //category_id check
  if (isset($_POST['bid']) && !empty($_POST['bid'])) {
    $bid =  validateUserData($_POST['bid']); 
  } else {
    $err['bid'] = 'Enter bid';
  }
  if (isset($_POST['name']) && !empty($_POST['name'])) {
    $name =  validateUserData($_POST['name']); 
  } else {
    $err['name'] = 'Enter name';
  }
  if (isset($_POST['authors']) && !empty($_POST['authors'])) {
    $authors =  validateUserData($_POST['authors']);
  } else{
    $err['authors'] = 'Enter authors';
  }
  if (isset($_POST['edition']) && !empty($_POST['edition'])) {
    $edition =  validateUserData($_POST['edition']); 
  } else {
    $err['edition'] = 'Enter edition';
  }
  if (isset($_POST['status']) ) {
    $status =  validateUserData($_POST['status']); 
  } else {
    $err['status'] = 'Enter status';
  }
if (isset($_POST['quantity']) && !empty($_POST['quantity'])) {
    $quantity =  validateUserData($_POST['quantity']); 
  }
if(!is_numeric($quantity)) {
        $err['quantity'] =  'Enter quantity in integer';
  } 
  else {
    $err['quantity'] = 'Enter quantity';
  }
 


//  $dept = $_POST['Department'];
//  if($dept){
//   foreach ($Department as d ) {
   
//   }
// }
$DepartmentID = $_POST['DepartmentID'];

  
  if (count($err) == 0) {
    //make query to insert data
    // if($dept){

    // }
    echo $sql = "insert into books(bid,name,authors,edition,status,
    quantity,DepartmentID) 
    values ('$bid','$name','$authors','$edition','$status','$quantity','$DepartmentID')";
    //execute query
    $db->query($sql);   
    //check data insert status
    if ($db->affected_rows == 1 && $db->insert_id >0 ) {   
      //get department id as an array and loop with book_id and execute new sql query
      ?>
     <script type="text/javascript">alert('Insert Success')</script>
     <?php 
     }
     else { ?>
    <script type="text/javascript">alert('Insert Failed!!!')</script>
  <?php } 
}
}
?>
  

<!DOCTYPE html>
<html>
<head>
  <title>new</title>
  <style type="text/css">
    

.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-right: 45px;
    padding-left: 15px;
    margin-left: 500px;
    border: 2px solid black;
    background-color: lightblue;
}
.form-control {
  background-color: lightgreen;
}
.h2
{
  text-align: center;
}
.btn {
  height: 35px;
  width:450px;
  background-color: red;
}

  </style>
  <link rel="stylesheet" href= "js/chosen.min.css">
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/chosen.jquery.min.js"></script>
</head>
<body>

<a class="btn btn-primary"  href="create_depart.php">Add Department</a>

    <div class="card-header">
     
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          
        <form  
          method="post">
          <div class="form-group">
            <label for="bid">Book Code</label>
             <input type="text" name="bid" class="form-control" id="bid" placeholder="Enter Book Code" >
             
             
            <?php 
            if (isset($err['bid'])) {
              echo $err['bid'];
            }
            ?>
          </div>
          <div class="form-group">
            <label for="name">NAME</label>
            <input type="text" name="name" class="form-control" id="title" placeholder="Enter name" >
            <?php 
            if (isset($err['name'])) {
              echo $err['name'];
            }
            ?>
          </div>
          <div class="form-group">
            <label "authors">AUTHORS</label>
            <input type="text" name="authors" class="form-control" id="authors" placeholder="Enter authors" >
            <?php 
            if (isset($err['authors'])) {
              echo $err['authors'];
            }
            ?>
          </div>
          <div class="form-group">
            <label for="edition">Edition</label>
            <input type="text" name="edition" class="form-control" id="edition" placeholder="Enter edition" >
            <?php 
            if (isset($err['edition'])) {
              echo $err['edition'];
            }
            ?>
          </div>
          <div class="form-group">
            <label for="status">status</label><br>  
           <input type="radio" name="status" value="1"> Available <br> 
           <input type="radio" name="status" value="0" checked="" > Unavailable
          </div>
          <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Enter quantity" >
            <?php 
            if (isset($err['quantity'])) {
              echo $err['quantity'];
            }
            ?>

            <div class="form-group" >
            <label for="department_id">Department ID</label>
            <select multiple class="form-control" id = "mselect" name="department[]" chosen ="">
              <option>select department</option>
              <?php foreach($data as $c){ ?>
                <option value="<?php echo $c['departmentID'] ?>"><?php echo $c['departmentName'] ?></option>
              <?php } ?>
            </select>
            
            <?php 
            if (isset($err['department'])) {
              echo $err['department'];
            }
            ?>
          </div>
          <input type="submit" name="btnSave" class="btn btn-success" value="Add book" >
        </form>
        <script type="text/javascript">
          $(document).ready(function(){
            $('#mselect').chosen();
          });
        </script>
      </div>
    </div>
  </div>
</div>
</body>
</html>