<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #E6B0AA; ">
	<?php
		$con=mysqli_connect("localhost:3307","root","","creditdb");
		if (isset($_POST['add_users'])){
			$name = $_POST['user'];
			$email = $_POST['email'];
			$currentcredit = $_POST['credit'];
			$query1 = mysqli_query($con,"select name from users where name = '$name'");
			$result1 = mysqli_fetch_row($query1);
			$name1 = $result1[0];
			if($name1 == null){
				$query="insert into users (name,email,currentcredit) values ('$name','$email','$currentcredit')";	
				$result=mysqli_query($con,$query);
				header("Location:viewusers.php");
			}
			else{
				echo"<div class='alert alert-danger' role='alert' style='width:300px;margin-left:10px;'>
						  <strong><h1>USER NAME IS ALREADY TAKEN</h1></strong>
						  <p>Try with another username </p>
						  </br>Click Here to go back to Home Page : <a href='index.php' class='alert-link'>HOME</a>.
						</div>
					";
			}
		}
	?>
</body>
</html>