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
<link rel="stylesheet" type="text/css" href="regs.css">
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
                <td><input type="text" name="user" id="text" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username']; setcookie("username", "", time() - 3600);?>" placeholder="Type in your Username" REQUIRED></td>
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