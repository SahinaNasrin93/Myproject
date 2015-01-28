<?php
    session_start();

    if (!(isset($_SESSION['super']))) {
        header ("Location: hello.php");
    }
    else
    {
        include('dbcon.php');
        
?>


<head>
<link rel="stylesheet" type="text/css" href="user-info.css">
</head>

<body>
    <form method="post" action="user-info.php">
            <div id="upar">
            <div id="image"><img src="logo.png" height="45" width="180"></div>
                <div id="right"><a href="logout.php">LOGOUT</a></div>
            </div>
            <div id="Content">
            <center>
            <label><h3><?php echo $_GET['m']; ?></h3></label>
            <label id="user"><h2>USER-LIST</h2></label><br>
            </center>
            <input type="text" name="text" id="text" value="<?php echo $_POST['text']; ?>" placeholder="Search"><input type="submit" name="submit" id="submit" value="Search">
            </form>
            <?php
                if($_POST['text'])
                {
                    $name=$_POST['text'];
                    $sql="SELECT * FROM user WHERE name LIKE '%$name%'";
                }
                else
                {
                    $sql = "SELECT * FROM user";
                }
                $retval = mysql_query( $sql, $conn );
                if(! $retval )
                {
                    die('Could not get data: ' . mysql_error());
                }
            ?>
            <div id="tabl">
                <table border="0" cellspacing="10">
                        <tr>
                        <td style="width:300px"><label>Name</label></td><td style="width:300px"><label>Email</label></td><td style="width:300px"></td></tr>
                        <?php
                            while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
                            {  

                        ?>
                        <tr>
                        <td style="width:300px">
                        <label><?php echo "{$row['name']}"; ?></label></td>
                        <td style="width:300px"><label><?php echo "{$row['email']}"; ?></label></td>
                        <td style="width:300px"><a id="a1" href="user.php?user=<?php echo $row['username'];?>">View</a></td></tr>
                        <?php
                            } 
                        ?>
                </table>
                </div>
            </div>
</body>
</html>
<?php
}
?>