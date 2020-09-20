<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
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
					<h1 style="margin-left: 50px;">CREDIT MANAGEMENT SYSTEM</h1>
					<h4 style="margin-left: 50px;">USERS CAN SEND AND RECEIVE CREDITS</h4>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUser" style="margin-top: 50px;margin-left: 50px;">
  						ADD USER
		    		</button>
		    		<h1 style="margin-left: 100px;">Visit TSF</h1>
		    		<a href="https://www.thesparksfoundationsingapore.org/" target="_blank"><img src="tsf.png" alt="TSF" style="margin-left: 100px;"></img></a>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
				<div class="modal modal-xs fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserTitle" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
				<div class='table-responsive' style="border-color:#E6B0AA ">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">ADD USER</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<form method="POST" action="add_user.php">
						<div class="row" >
							<div class="col-12 col-sm-12" style="padding-top: 20px;">
							<label for="user" class="mt">Enter User : </label>
							<input type="text" name="user" id="user" placeholder="Username should be unique" required>								
							</div>

						</div>
						<div class="row" >
							<div class="col-12 col-sm-12" style="padding-top: 20px;">
							<label for="email" class="mt">Enter Email : </label>
							<input type="text" name="email" id="email" required>								
							</div>

						</div>
						<div class="row" style="padding-top: 20px;">
							<div class="col-12 col-sm-12">
							<label for="credit" class="mt">Enter Credit : </label>
							<input type="text" name="credit" id="credit" required>								
							</div>

						</div>
						<div class="row" style="padding-top: 20px;">
							<div class="col-12 col-sm-12">
								<input type="submit" name="add_users" value="ADD">
							</div>
						</div>
			      	</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			</div>
			  </div>
			</div>
	</div> 

</body>
</html>


