<html>
<head>
</head>
<body>
	<?php
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$db=$_POST['db'];

		$servername='localhost';
		$username=$user;
		$password=$pass;
		$conn=mysql_connect($servername,$username,$password);

		if(!$conn) {
    		header("location:database.php?m=Connection Error");
		}

		// Create database
		$sql = "CREATE DATABASE ". $db;
		if (mysql_query($sql,$conn)) {
			mysql_select_db($db);
    		$query="CREATE TABLE user
			(
				id int NOT NULL AUTO_INCREMENT,
				name varchar(50),
				email varchar(50),
				username varchar(50),
				gender varchar(10),
				phone varchar(50),
				password varchar(50),
				PRIMARY KEY(id)
			)"; 
			$res=mysql_query($query);
			if($res)
			{	
				mysql_select_db($db);
				$pwd=md5("admin");
				$q="INSERT INTO user (name,email,username,gender,phone,password) VALUES ('Sahina Nasrin','sahi3837@gmail.com','sahi3837','Female','8961714121','$pwd')";
				mysql_query($q);
				$data1="<?php";
				$data2="$"."servername='localhost';";
				$data3="$"."username='".$username."';";
				$data4="$"."password='".$password."';";
				$data5="$"."conn=mysql_connect("."$"."servername,$"."username,$"."password);";
				$data6="mysql_select_db('".$db."');";
				$data7="if(!$"."conn) {
    		die("."'Connection failed: '".".mysql_error());
		}";
		$data8="?>";
		$data=array($data1,$data2,$data3,$data4,$data5,$data6,$data7,$data8);

				echo file_put_contents("dbcon.php",join("\n",$data));

				header("location:database.php?m=Table created Successfully");
			}

		} else {
    		header("location:database.php?m=Error creating database");

		}

mysql_close($conn);
?>


