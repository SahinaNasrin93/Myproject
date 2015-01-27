<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header ("Location: login_sucess.php");
        exit;
    }
    else if (isset($_SESSION['super'])) {
        header ("Location: user-info.php");
        exit;
    }
?>
<html>
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
    label{
        color:white;
        font-size:14pt;
        font-family: Arial, Helvetica, Sans-serif;
    }
    #content{
	   width: 100%;
	   height: 100%;
	   background : #8779C2;
	   overflow:hidden; 
	   background : radial-gradient(#9f93ce,#6c609b);
	   padding:0;
       margin:0;
    }
    #upar{
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
    #submit{
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
    table{
	   padding-top: 0.5cm;
    }
    h2{
	   padding-top: 1cm;
	   font-family: Arial, Helvetica, Sans-serif;
    }
    #echo
    {
        padding-top: 1cm;

    }
    #labl
    {
        font-family: Arial, Helvetica, Sans-serif;
        font-size:15pt;
        color:black;
        text-shadow: 0.5px 0.5px #ffffff;
        background:linear-gradient(#ffd300,#ffa800);
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        border: 1px solid #ffbd00;
    }
    </style>
</head>

<body>
    <div id="upar">
        <div id="image"><img src="logo.png" height="45" width="180"></div>
            <div id="right"><a href="register.php">REGISTER</a></div>
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
        <label><h2>Login</h2></label>
        <table border="0" cellspacing="20">
            <form method="POST" action="next.php">
            <tr>
                <td><input type="text" name="user" id="text" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['user']; setcookie("username", "", time() - 3600);?>" placeholder="Type in your Username" REQUIRED></td>
            </tr>
            <tr>
                <td> <input type="password" name="pass" id="text" placeholder="Type in your password" REQUIRED></td>
            </tr>
            <tr>
                <td><input id="submit" type="submit" name="submit" value="Login"></td>
            </tr>
            </form>
        </table>
    </center>
    </div>
</body>
</html>