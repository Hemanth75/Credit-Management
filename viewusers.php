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
	<div class="container" style="padding-top: 40px;">
		<div class="row" >
					<div class="col-12 col-sm-12">
						<p>Click on user name to view details of the user</p>
					</div>
			<div class="col-12 col-sm-12">
				<?php 
					$con=mysqli_connect("localhost:3307","root","","creditdb");
					$query="select * from users";
					$result=mysqli_query($con,$query);

					echo "<div class='table-responsive'><table class='table table-hover table-sm' id='myTable'>
				    <thead>
				    <tr>
					<th>NAME</th>
					<th>EMAIL</th>
					<th>CREDIT</th>
					</tr>
					</thead>";
					while ($row=mysqli_fetch_array($result)) {
						echo "<tbody><tr >";
						echo "<td><a href='user.php?user=$row[name]'>".$row['name']."</a></td>";
						echo "<td>".$row['email']."</td>";
						echo "<td>".$row['currentcredit']."</td>";
						echo "</tr></tbody>";
					}
					echo "</table></div>";
				?>
			</div>
		</div>
	</div>
</body>
</html>