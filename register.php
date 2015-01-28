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
	<title>Sign-Up</title>
    <link rel="stylesheet" type="text/css" href="regs.css">
    <script>

        function validateForm()  
        {  
            var x = document.forms["form"]["email"].value;
            var atpos = x.indexOf("@");
            var dotpos = x.lastIndexOf("."); 
            var inputtxt=document.getElementById("phone");
            if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length){
                alert("Not a valid e-mail address");
                return false;
            }
            else if( ( form.radio[0].checked == false ) && ( form.radio[1].checked == false ) ){
                alert("Please choose your Gender: Male or Female");
                return false;
            }
            else if(isNaN(inputtxt.value))
        	{
        		alert("plz enter digits in phone number");
        		return false;
        	}
            else
            {
    	       return true;
            }
        }  
    </script>
</head>

<body>
    <?php setcookie("email", "", time() - 3600); 
            setcookie("phone", "", time() - 3600);
            setcookie("passwd", "", time() - 3600);
            ?>
    <div id="upar">
        <div id="image"><img src="logo.png" height="45" width="180"></div>
        <div id="right"><a href="hello.php">LOGIN</a></div>
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
        <label><h2>Register Here</h2></label>
        <table border="0" cellspacing="10">
        <tr>
            <form method="POST" action="welcome.php" name="form" onsubmit="return validateForm();" method="post">
            <td> <input type="text" name="name" id="text" value="<?php echo $_COOKIE['name']; setcookie("name", "", time() - 3600); ?>" placeholder="Enter your name" REQUIRED><span class="required">*</span></td>
        </tr>
        <tr>
            <td><input type="text" name="email" id="text" value="<?php echo $_COOKIE['email']; setcookie("email", "", time() - 3600); ?>" placeholder="Enter your email" REQUIRED><span class="required">*</span></td>
        </tr>
        <tr>
            <td><label>Gender: </label><input type="radio" name="radio" value="Male"><label>Male </label><input type="radio" name="radio" value="Female"><label>Female</label><span class="required">*</span></td>
        </tr>
        <tr>
            <td><input type="text" name="phone" id="phone" value="<?php echo $_COOKIE['phone']; setcookie("phone", "", time() - 3600); ?>" placeholder="Enter your phone" pattern=".{10,}" required title="10 digits minimum"><span class="required">*</span></td>
        </tr>
        <tr>
            <td> <input type="password" name="pass" id="text" value="<?php echo $_COOKIE['passwd']; setcookie("passwd", "", time() - 3600); ?>" placeholder="Enter your password" REQUIRED><span class="required">*</span></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" id="submit" value="Complete Sign-Up"></td>
        </tr>
            </form>
        </table>
        </center>
    </div>
</body>
</html>