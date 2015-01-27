<?php
    session_start();

    if (!(isset($_SESSION['user']))) {
    header ("Location: hello.php");
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
        while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
        {
?>



<html>
<head>
	<title>Sign-Up</title>
	<style>
    #text{
        width:400px;
        height:40px;
        font-size:10pt;
        border-style: solid;
        border-width: 5px;
        border-color: #7c70b8;
    }
    #phone{
        width:400px;
        height:40px;
        font-size:10pt;
        border-style: solid;
        border-width: 5px;
        border-color: #7c70b8;
    }
    #label {
        color:white;
        font-size:15pt;
        font-family: Arial, Helvetica, Sans-serif;
        text-shadow: 0.5px 0.5px #000000;
    }
    #content
    {
	   width: 100%;
	   height: 100%;
	   background : #8779C2;
	   overflow:hidden; 
	   background : radial-gradient(#9f93ce,#6c609b);
	   padding:0;
        margin:0;
    }
    #upar
    {
    	width: 100%;
    	height: 10%;
    	background : #2A2A2A;
    	overflow:hidden; 
    	padding:0;
        margin:0;
    }
    #image{
        float:left;
        padding-top:8px;
        padding-bottom:8px;
        padding-left:100px;   
    }
    #right{
        float:right;
        padding-top:23px;
        padding-bottom:8px;
        padding-left:100px;   
        }
    a{
        color:#ffffff;
        text-decoration: none !important;
        padding-right: 2cm;
        padding-top: 1cm;
        font-family: Arial, Helvetica, Sans-serif;
    }
    #submit
    {
        width:400px;
        padding: 10px 15px 11px !important;
        font-size: 17px !important;
        background: linear-gradient(#ffd300,#ffa800);
        text-shadow: 1px 1px #ffffff;
        color: black;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        border: 1px solid #ffbd00;
    }
    table
    {
    	padding-top: 0.5cm;
        padding-left: 0.5cm;
    	background : radial-gradient(#9f93ce,#6c609b);
    }
    #col
    {
        font-family: Arial, Helvetica, Sans-serif;
        font-size:27pt;
        color:black;
        background:linear-gradient(#ffd300,#ffa800);
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        border: 1px solid #ffbd00;
    }
    #labl
    {
        color:white;
        font-size:15pt;
        font-family: Arial, Helvetica, Sans-serif;
    }
    #labl1
    {
        color:white;
        font-size:27pt;
        font-family: Arial, Helvetica, Sans-serif;
    }
    h2{
    	padding-top: 1cm;
    	font-family: Arial, Helvetica, Sans-serif;
    }

    </style>
</head>
<body>
    <div id="upar">
        <div id="image"><img src="logo.png" height="45" width="180"></div>
        <div id="right"><a href="logout.php">LOGOUT</a></div>
    </div>
    <div id="Content">
        <center>
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