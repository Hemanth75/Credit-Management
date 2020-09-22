<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php include('header.php'); ?> 
	<div class="container">
	<div class="row">
	<div class="col-12 col-sm-12">
			<div class='table-responsive' style="border-color:#E6B0AA ">
	<?php
		$con=mysqli_connect("localhost:3307","root","","creditdb");
		if (isset($_POST['add_users'])){
			$name = $_POST['user'];
			$email = $_POST['email'];
			$currentcredit = $_POST['credit'];
			$query1 = mysqli_query($con,"select name from users where name = '$name'");
			$result1 = mysqli_fetch_row($query1);
			$name1 = $result1[0];
			do{
			if($name1 == null && $currentcredit > 0){
				$query="insert into users (name,email,currentcredit) values ('$name','$email','$currentcredit')";	
				$result=mysqli_query($con,$query);
				header("Location:viewusers.php");
				break;
			}
			if($name1 != null){
				echo"<div class='alert alert-danger' role='alert' style='width:300px;margin-left:10px;'>
						  <strong><h1>USER NAME IS ALREADY TAKEN</h1></strong>
						  <p>Try with another username </p>
						  </br>Click Here to go back to Home Page : <a href='index.php' class='alert-link'>HOME</a>.
						</div>
					";
					break;
			}
			if($currentcredit == 0){
				echo"<div class='alert alert-danger' role='alert' style='width:300px;margin-left:10px;'>
						  <strong><h1>You Entered Zero Credits</h1></strong>
						  <h4>Enter more than zero </h4>
						  </br>Click Here to go back to Home Page : <a href='index.php' class='alert-link'>HOME</a>.
					</div>
					";
				break;	
			}
			if($currentcredit < 0){
				echo"<div class='alert alert-danger' role='alert' style='width:300px;margin-left:10px;'>
						  <strong><h1>You Entered Negative Amount</h1></strong>
						  </br>Click Here to go back to Home Page : <a href='index.php' class='alert-link'>HOME</a>.
					</div>
					";
				break;	
			}
		}while(0);
		}
	?>
	</div>
	</div>
	</div>
	</div>
</body>
</html>