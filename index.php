<?php


ob_start();
session_start();
require('connect.inc.php');

if(isset($_POST['username']) && isset($_POST['password']))
{
	$username= $_POST['username'];
	$password = md5($_POST['password']);
	if(!empty($username) && !empty($password))
	{
	$query = "SELECT `u_id` FROM `user` WHERE `u_name`='".mysql_real_escape_string($username)."' AND `u_pass`='".mysql_real_escape_string($password)."'";
	if($query_run = mysql_query($query))
	{
		
		$query_num_rows = mysql_num_rows($query_run);
		if($query_num_rows==0)
		{
			?>
			<script type="text/javascript" >alert("Invalid username/password combination.");</script>
				<?php
				ob_start();		
				echo("<script>location.href ='index.php'</script>");
				ob_end_flush();
 				exit();
			
		}
		else if($query_num_rows==1)
		{
			$user_id = mysql_result($query_run,0,'u_id');
			$_SESSION['user_id']=$user_id;
			header('location:home.php');
		}
	}
	
	}
	else
	{
				ob_start();
 				echo("<script>alert('Please enter both the fields');</script>");
				echo("<script>location.href ='index.php'</script>");
				ob_end_flush();
 				exit();
	}

}
?>
<html>
	<head>
		<title>Home | Fantasy League</title>
		
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/style.css"/>
		
	</head>
	<body>
		<div id="wrapper" class="col-lg-8 col-lg-offset-2">

			<div id="titlebody" class="row" style="background-color:white;">
				<img style="width:100%;" class="img-responsive" src="css/banner.jpg"></img>
			</div>
			<div id="disp" class="row">
				<h4>Welcome.Login to Continue.</h4>
			</div>
			<!--Welcome Name-->

			<div id="main_body" class="row">
			
				<div class="col-lg-4 col-lg-offset-4" style="background-color:#ffffff;">
					<form method="post" action="index.php">
						<h4 class="modal-title info" id="myModalLabel" style="text-align:center;">Login</h4>
						<div class="form-group">
    						<label for="exampleInputName2">Username:</label>
    						<input type="text" class="form-control" name="username" id="exampleInputName2" placeholder="nandish">
  						</div>
  						<div class="form-group">
    						<label for="exampleInputEmail2">Password:</label>
    						<input type="password" name="password" class="form-control" id="exampleInputEmail2" placeholder="abc">
  						</div>
						<button type="submit" class="btn btn-primary">Login</button></br>
						Not Registered yet? 
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Register</button>
					</form>
					<!--modal start-->
					<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  						<div class="modal-dialog modal-sm">
    						<div class="modal-content">
      							<div class="modal-header" class="info">
        							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        							<h4 class="modal-title info" id="myModalLabel" style="text-align:center;">Register</h4>
      							</div>
      							 <div class="modal-body">
       								<form method="post" action="register.php">
       									<div class="form-group">
    										<label for="exampleInputEmail1">Username</label>
    										<input type="username" name="name" class="form-control" id="exampleInputEmail1" placeholder="nandish">
  										</div>
  										<div class="form-group">
    										<label for="exampleInputPassword1">Password</label>
    										<input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
  										</div>
  										<div class="form-group">
    										<label for="exampleInputPassword2">Confirm Password</label>
    										<input type="password" name="confirm_pass" class="form-control" id="exampleInputPassword2" placeholder="Password">
  										</div>
  										<button type="submit" class="btn btn-primary">Submit</button>
       								</form>
      							</div>

    							
  							</div>
						</div>
					</div>	
					<!--modal end-->
					
				</div>
				<div class="col-lg-8" style="background-color:#ffffff;overflow:hidden;">
					<span></span>
				</div>
				

			
			<!--row close-->
			</div><!--container close-->

			<div id="footer" class="row">
				<div class="col-lg-12">
					<h4 style="float:left;color:white;overflow:hidden;">IPL Fantasy league</h4>
					<h6 style="float:right;color:white;overflow:hidden;">Developed by: Nandish Kotadia</h6>
				</div>
				
			</div>

		</div><!--wrapper close-->
		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</body>
</html>