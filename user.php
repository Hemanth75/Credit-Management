<?php
	session_start();
	$_SESSION['currentuser'] = $_GET['user'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		table{
			border-style: solid;
			border-width: 1px;
			height: auto;
			overflow-y: scroll;
		}
		table th{
			color:black;
		}
		html, body {margin: 0; width: 100%; overflow-x: hidden;}

	</style>
</head>
<body>
	<?php include('header.php'); ?> 
		<div class="container" style=" padding-top: 40px;">
			<div class="row">
				<div class="col-12 col-sm-12">
					<?php 
						$con=mysqli_connect("localhost:3307","root","","creditdb");
						$user=$_GET['user'];
						$query="select * from users where name='$user'";
						$result=mysqli_query($con,$query);

						echo "<div class='table-responsive'><table class='table table-hover table-responsive-sm' id='myTable'>
					    <thead>
					    <tr>
						<th>NAME</th>
						<th>EMAIL</th>
						<th>CREDIT</th>
						</tr>
						</thead>";
						while ($row=mysqli_fetch_array($result)) {
							echo "<tbody><tr >";
							echo "<td>".$row['name']."</td>";
							echo "<td>".$row['email']."</td>";
							echo "<td>".$row['currentcredit']."</td>";
							echo "</tr></tbody>";
						}
						echo "</table></div>";
					?>
				</div>
			</div>
				<div class="col-12 col-sm-12">
					<div class='table-responsive' style="background-color:#E8F6F3 ">
					<div class="card" style="background-color: #E8F6F3;width: 280px;height: 250px;">
						<form method="POST" action="transaction.php">
						<div class="row" style="padding-top: 10px;padding-left:0px;">
							<div class="col-12 col-sm-12">
								<p>Transfer Credits Here</p>
							</div>
							<div class="col-12 col-sm-12">
							<label for="credit" class="mt">Credits : </label>
							<input type="number" name="credit" id="credit" required>								
							</div>

						</div>
						<div class="row" style="padding-top: 20px;padding-left: 10px;">
							<div class="col-12 col-sm-12">
							<label for="user" class="mt">Select User  : </label>
							<select required size="5" style="width: 150px;color: black;background-color: #E8F6F3;" name="user" id="user" class="mt" >
								<option value="" disabled>Select</option>
			                    <?php
									$con=mysqli_connect("localhost:3307","root","","creditdb");
			                    	$user = $_GET['user'];
			                        $query = "select * from users where name != '$user'";
									$result=mysqli_query($con,$query);
			                        while ($row = mysqli_fetch_array($result)) {
			                        	$name = $row['name'];
			                            echo "<option value='$name' required>$name</option>";
			                        }
			                    ?>                         
							</select><br>
							</div>
						</div>
						<div class="row" style="padding-top: 10px;padding-left: 10px;">
							<div class="col-12 col-sm-12">
								<input type="submit" name="user_transaction" value="SEND">
							</div>
						</div>
					</form>
				</div>
				</div>
			</div>
		</div>

</body>
</html>