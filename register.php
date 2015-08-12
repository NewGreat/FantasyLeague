<?php
require('connect.inc.php');

$name= $_POST['name'];
$pass = $_POST['pass'];
$confirm_pass= $_POST['confirm_pass'];

if(isset($_POST['name']) && isset($_POST['pass']) && isset($_POST['confirm_pass']) && !empty($name) && !empty($pass) && !empty($confirm_pass))
{
	if($pass==$confirm_pass)
	{
		
		$query = "SELECT `u_name` FROM `user` WHERE `u_name`='$name'";
		$query_run = mysql_query($query);
		if(mysql_num_rows($query_run)==1)
		{
			ob_start();
			echo("<script>alert('Username already exists.');</script>");
			echo("<script>location.href ='index.php'</script>");
			ob_end_flush();
 			exit();
		}
		else
		{
			$query = "INSERT INTO `user` VALUES ('','".mysql_real_escape_string($name)."','".mysql_real_escape_string(md5($pass))."')";
					if($query_run = mysql_query($query))
					{
						ob_start();
						echo("<script>alert('Registered Successfully');</script>");
						echo("<script>location.href ='index.php'</script>");
						ob_end_flush();
 						exit();
					}
					else
					{
						ob_start();
						echo("<script>alert('Sorry try again later..');</script>");
						echo("<script>location.href ='index.php'</script>");
						ob_end_flush();
 						exit();	
					}
		}

	}
	else
	{
				ob_start();
				echo("<script>alert('Passwords do not match');</script>");
				echo("<script>location.href ='index.php'</script>");
				ob_end_flush();
 				exit();
	}
}
else
{
				ob_start();
				echo("<script>alert('Please enter all the fields');</script>");
				echo("<script>location.href ='index.php'</script>");
				ob_end_flush();
 				exit();
}
?>