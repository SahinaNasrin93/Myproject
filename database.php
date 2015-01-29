<html>
<head>
<?php
session_start();
if (!(isset($_SESSION['db']))) {
?>
    <link rel="stylesheet" type="text/css" href="regs.css">
</head>

<body>
    <div id="upar">
        <div id="image"><img src="logo.png" height="45" width="180"></div>
            <div id="right"><a href="index.php">LOGIN</a></div>
        </div>
    <div id="Content">
    <center>
    <?php
        if($_GET['m'])
        {
        ?>
            <div id="echo"><label id="labl"><?php echo $_GET['m']; ?></label></div>
        <?php
        }
        ?>
        <label><h2>Create Database</h2></label>
        <table border="0" cellspacing="20">
            <form method="POST" action="createdb.php">
            <tr>
                <td><input type="text" name="user" id="text" placeholder="Type in your Username" REQUIRED></td>
            </tr>
            <tr>
                <td> <input type="password" name="pass" id="text" placeholder="Type in your password" REQUIRED></td>
            </tr>
            <tr>
            	<td> <input type="text" name="db" id="text" placeholder="Type in your Database name" REQUIRED></td>
            </tr>
            <tr>
                <td><input id="submit" type="submit" name="submit" value="Create"></td>
            </tr>
            </form>
        </table>
    </center>
    </div>
</body>
<?php
}
else
{
	session_start();
	$_SESSION['db']=1;
?>
	 <link rel="stylesheet" type="text/css" href="regs.css">
</head>

<body>
    <div id="upar">
        <div id="image"><img src="logo.png" height="45" width="180"></div>
        </div>
    <div id="Content">
    <center>
    <?php
        if($_GET['m'])
        {
        	$m=$_GET['m'];

        ?>
            <div id="echo"><label id="labl"><?php echo $m; ?></label></div><br>
        <?php
        }
        else
        {
        ?>
        	<div id="echo"><label id="labl">Database has been created</label></div><br>
        <?php
        }
        ?>
        <a id="anchor" href="index.php">LOGIN</a><br><a id="anchor" href="register.php">REGISTER</a>
        </center>
        </div>
        </body>
<?php
}
?>

</html>