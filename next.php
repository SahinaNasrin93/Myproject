<html>
<head>
</head>
<body>
	<?php
		include('dbcon.php');
		$username=$_REQUEST['user'];
		$pass=$_REQUEST['pass'];
		$password=md5($pass);

		if(strcmp($username,"sahi3837")==0)
		{
			$sql="SELECT * FROM user WHERE username='$username' and password='$password'";
			$result=mysql_query($sql);
			$count=mysql_num_rows($result);

			if($count==1){
			session_start();
			$_SESSION['super'] = $username;
			header("location:user-info.php");
			exit;
			}
			else {
				header("location:hello.php?m=Invalid credentials");
			}
		}
		$sql="SELECT * FROM user WHERE username='$username' and password='$password'";
		$result=mysql_query($sql);
		$count=mysql_num_rows($result);

		if($count==1){
			session_start();
			$_SESSION['user'] = $username;
			header("location:login_sucess.php");
			exit;
			}
		else {
			$cookie_name = "username";
			$cookie_value = $username;
			setcookie($cookie_name, $cookie_value);
			header("location:hello.php?m=Invalid credentials");
			}

?>
</body>
</html>