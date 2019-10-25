<!DOCTYPE html>
<html>
<head>
	<title>multiple select plugin demo</title>
	<link rel="stylesheet" href= "js/chosen.min.css">
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  	<script type="text/javascript" src="js/chosen.jquery.min.js"></script>
</head>
<body>
	<form>
		<select name = "option"  id = "mselect" multiple = "" style = "width : 300px;">
			<option value="value1">option1</option>
			<option value="value2">option2</option>
			<option value="value3">option3</option>
			<optionvalue="value4">option4</option>
			<option value="value5">option5</option>
		</select>
		<button name = "btn"> click me</button>
	</form>

</body>
</html>
<script type="text/javascript">
          $(document).ready(function(){
            $('#mselect').chosen();
          });
</script>
<?php 
if( isset($_POST['btn'])){
	require "connection.php";

} ?>
