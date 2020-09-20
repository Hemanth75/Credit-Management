<?php 

   session_start(); 
   $currentuser =  $_SESSION['currentuser'];

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
				html, body {margin: 0; height: 100%; overflow: auto;}
	</style>
</head>
<body>
	<?php include('header.php'); ?> 
	<div class="container">
	<div class="row">
	<div class="col-12 col-sm-12">
			<div class='table-responsive' style="border-color:#E6B0AA ">
	<?php 
		$con=mysqli_connect("localhost:3307","root","","creditdb");
		do
		{
			if (isset($_POST['user_transaction'])){
				$credit=$_POST['credit'];
				$user=$_POST['user'];
				$credit_query = mysqli_query($con,"select currentcredit from users where name='$currentuser'");
				$usercredit = mysqli_fetch_row($credit_query);
				$required_amount = ($credit - $usercredit[0]);
				if($credit>0 && $usercredit[0] >= $credit ){
					$insert_query = mysqli_query($con,"insert into transaction (sender,credit,receiver) values ('$currentuser','$credit','$user')");
				}
				if($usercredit[0] < $credit){
					echo"<div class='alert alert-danger' role='alert' style='width:300px;margin-left:10px;'>
							  <strong><h1>Insufficient Credit!</h1></strong>
							  <h4>You need $required_amount more to transfer </h4>
							  </br>Click Here to go back to Home Page : <a href='index.php' class='alert-link'>HOME</a>.

						</div>
						";
					break;
				}
				if($credit < 0){
					echo"<div class='alert alert-danger' role='alert' style='width:300px;margin-left:10px;'>
							  <strong><h1>You Entered Negative Amount</h1></strong>
							  </br>Click Here to go back to Home Page : <a href='index.php' class='alert-link'>HOME</a>.

						</div>
						";
					break;	
				}
				$query1="update users set currentcredit=currentcredit+'$credit'where name='$user'";
				$query2="update users set currentcredit=currentcredit-'$credit'where name='$currentuser'";
				$result1=mysqli_query($con,$query1);
				$result2=mysqli_query($con,$query2);
				if($result1 && $result2){
					echo"<div class='alert alert-success' role='alert' style='width:300px;margin-left:10px;'>
							  <strong><h1>Transaction Was Successful !</h1></strong>
							  </br>Click Here to go back to Home Page : <a href='index.php' class='alert-link'>HOME</a>.

						</div>
						";
					break;	
				}
			}
		}while(0);
	?>
	</div>
</div>
</div>
</div>

</body>
</html>