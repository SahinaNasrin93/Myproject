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
label {
    color:white;
    font-size:14pt;
    font-family: Arial, Helvetica, Sans-serif;
}
#user {
    color:white;
    font-size:18pt;
    font-family: Arial, Helvetica, Sans-serif;
}
#content
{
	width: 100%;
	height: 100%;
	background : #8779C2;
	overflow:hidden; 
	background : radial-gradient(#9f93ce,#6c609b);
	padding-top:1cm;
    padding-left:3cm;
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
a {
    color:#ffffff;
    text-decoration: none !important;
    padding-right: 2cm;
    padding-top: 1cm;
    font-family: Arial, Helvetica, Sans-serif;
}
#a1 {
    float: right;
    display: block;
    width: 30px;
    height: 20px;
    padding-right: 1cm;
    padding: 1px 15px;
    background: #8174BC;
    border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border: 2px solid #8174BC;
    box-shadow: 1px 1px 1px 1px #70649f;
    text-decoration: none !important;
    text-align: center;
    color:#ffffff;
    font-family: Arial, Helvetica, Sans-serif;
}
#submit
{
    width:90px;
    height:40px;
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
    background : radial-gradient(#9f93ce,#6c609b);
    text-shadow: 0.5px 0.5px #000000;
}
#tabl
{
    padding-top: 0.2cm;
}
h2{
    padding-right: 5cm;
	font-family: Arial, Helvetica, Sans-serif;
}
</style>
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