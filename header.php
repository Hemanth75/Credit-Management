<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		.table-header{
			border-style: hidden;
			border-width: 0px;
			height: auto;
			overflow-y: scroll;
		}
		.table-header .th{
			color:black;
		}
		html, body {margin: 0; width: 100%; overflow-x: hidden;}
	</style>

</head>
<body style="background-color: #E6B0AA; ">
	
	<div class="row">
		<div class="col-12 col-sm -12 col-xs-12">
					<nav class="navbar navbar-dark " style="background-color: #E8F6F3">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar" style="background-color: black;"></span>
		        <span class="icon-bar" style="background-color: black;"></span>
		        <span class="icon-bar" style="background-color: black;"></span>                        
		      </button>
		      <a class="navbar-brand" href="index.php">CreditManagement</a>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar">
		      <ul class="nav navbar-nav">
		        <li><a class="nav-link active" href="index.php"><div>HOME</div></a></li>
		        <li><a class="nav-link active" href="viewusers.php"><div>View All Users</div></a></li>
		      </ul>
		      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" style="margin-top: 10px;">
  					View Transaction History
			</button>
		    </div>
		  </div>
		</nav>
		</div>
	</div>
	<div class="container">
				<div class="modal modal-xs fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-scrollable" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Transaction History</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<?php 
				$con=mysqli_connect("localhost:3307","root","","creditdb");
				$query=" select * from transaction ";
				$result=mysqli_query($con,$query);
				echo "<div class='table-responsive'><table class='table table-header table-hover table-responsive-sm'>
					<thead>
				    <tr>
					<th>FROM</th>
					<th>CREDITS</th>
					<th>TO</th>
					</tr>
					</thead>";
				while($row=mysqli_fetch_array($result)){
					echo "<tbody><tr>";
					echo "<td>".$row['sender']."</td>";
					echo "<td>"." transferred Rs. ".$row['credit']." to "."</td>";
					echo "<td>".$row['receiver']."</td>";
					echo "</tr></tbody>";
				}
				echo "</table></div>";
			?>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>


	</div>

</body>
</html>


