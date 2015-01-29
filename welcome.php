<html>
<head>
</head>
<body>
	<?php
	include('dbcon.php');

	$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$parts = explode("@",$email);
	$username = $parts[0];
	$user=$username;
	$gender=filter_var($_POST['radio'], FILTER_SANITIZE_STRING);
	$phone=filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
	$password=filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
	$pass=md5($password);

	$result=mysql_query("SELECT * FROM user WHERE email='$email'");
	$count=mysql_num_rows($result);
	if($count==0){
		$res=mysql_query("SELECT * FROM user WHERE username='$username'");
		$c=mysql_num_rows($res);
		$i=0;
		while($c)
		{
			$username=$user.'_'.$c;
			$r=mysql_query("SELECT * FROM user WHERE username='$username'");
			$c=mysql_num_rows($r);
			if(!$c)
			{
				break;
			}
			else
			{
				$i=$i+1;
				$c=$c+$i;
			}
		}
		$sql="INSERT INTO user (name,email,username,gender,phone,password) VALUES ('$name','$email','$username','$gender','$phone','$pass')";

		if (mysql_query($sql,$conn)) {
   		$to = $email;
   		$subject = "This is subject";
   		$message = "Hello $name\nYour are successfully registered\nYour username is $username";
   		$header = "From:sahi3837@gmail.com \r\n";
   		$retval = mail ($to,$subject,$message,$header);
   		if( $retval == true )  
   		{
      		header("location:register.php?m=Successfully registered");
			exit;
   		}
   		else
   		{
      		header("location:register.php?m=unSuccessfull registered");
      		exit;
   		}
	} 
	else{
			header("location:register.php?m=Connection failed");
      		exit;
		}
	}
	else
	{
			setcookie("name", $name);
			setcookie("email", $email);
			setcookie("phone", $phone);
			setcookie("radio", $gender);

			header("location:register.php?m=Email already exists");
      		exit;	
	}
	mysql_close($conn);
?>
</body>
</html>