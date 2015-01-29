<?php
    session_start();

    if (!(isset($_SESSION['user']))) {
    header ("Location: index.php");
    exit;
    }
    else 
    {
       include('dbcon.php');
        $sql = "SELECT name,email,gender,phone FROM user WHERE username='" . $_SESSION['user'] . "'";
        $retval = mysql_query( $sql, $conn );
        if(! $retval )
        {
            die('Could not get data: ' . mysql_error());
        }
        
?>



<html>
<head>
	<title>Sign-Up</title>
	<link rel="stylesheet" type="text/css" href="log.css">
</head>
<body>
    <div id="upar">
        <div id="image"><img src="logo.png" height="45" width="180"></div>
        <div id="right"><a href="logout.php">LOGOUT</a></div>
    </div>
    <div id="Content">
        <center>
        <?php
        	while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
        	{
        ?>
        <h2><label id="labl1">Welcome    </label><label id="col"> <?php echo "{$row['name']}"; ?></label></h2><br><br>
        <table border="0" cellspacing="10">
        <tr>
            <td style="width:400px">
            <label id="label">Email:  <?php echo "{$row['email']}"; ?></label></td></tr>
        <tr><td style="width:400px"><label id="label">Gender:  <?php echo "{$row['gender']}"; ?></label></td></tr>
        <tr><td style="width:400px"><label id="label">Phone number: <?php echo "{$row['phone']}"; ?></label></td></tr>
        </table>

    <?php
    } 
        mysql_close($conn);
    }
    ?>
    </center>
    </div>
</body>
</html>