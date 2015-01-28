<?php
	session_start();
	include('dbcon.php');
	if($_GET['id'])
	{
		$id=$_GET['id'];
		$sql="SELECT * FROM user WHERE id='$id'";
	}
	else if($_GET['user'])
	{
		$username=$_GET['user'];
		$sql="SELECT * FROM user WHERE username='$username'";
	}
	else if($_GET['name'])
	{
		$username=$_GET['name'];
		$sql="SELECT * FROM user WHERE name='$username'";
	}
	else if (isset($_SESSION['user'])) {
		$sql="SELECT * FROM user WHERE username='" . $_SESSION['user'] . "'";
	}
	else if(isset($_SESSION['super']))
	{
		$sql="SELECT * FROM user WHERE username='" . $_SESSION['super'] . "'";
	}
	else
	{
		header("location:pagenotfound.php?msg=Page not found");
		exit;
	}
	$retval = mysql_query( $sql, $conn );
	$count=mysql_num_rows($retval);
	if($count==0)
	{
		header("location:pagenotfound.php?msg=Page not found");
		exit;
	}
	if(! $retval )
	{
	  die('Could not get data: ' . mysql_error());
	}
?>



<html>
<head>
	<title>Sign-Up</title>
	<link rel="stylesheet" type="text/css" href="user.css">
</head>
<body>
	<div id="upar">
	<div id="image"><img src="logo.png" height="45" width="180"></div>
	<?php
	if(isset($_SESSION['user']) || isset($_SESSION['super']))
	{
	?>
		<div id="right"><a href="logout.php">LOGOUT</a></div>
	<?php
	}
	else
	{
	?>
		<div id="right"><a href="hello.php">LOGIN</a></div>
	<?php
	}
	?>
	</div>
	<div id="Content">
	<center>
	<?php
	while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
	{
	?>
		<label id="labl1"><h2><?php echo "{$row['name']}"; ?></h2></label>
		<table border="0" cellspacing="10">
		<tr>
			<td style="width:400px"><label>Email:  <?php echo "{$row['email']}"; ?></label></td></tr>
		<tr><td style="width:400px"><label>Gender:  <?php echo "{$row['gender']}"; ?></label></td></tr>
		<tr><td style="width:400px"><label>Phone number: <?php echo "{$row['phone']}"; ?></label></td></tr>
		</table>

<?php
} 
	mysql_close($conn);
?>
	</center>
	</div>
</body>
</html>