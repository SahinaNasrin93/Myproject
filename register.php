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
    #msg{
            padding-top: 2cm;
        }

    #upar{
	       width: 100%;
	       height: 10%;
	       background : #2A2A2A;
	       overflow:hidden; 
	       padding:0;
           margin:0;
        }

        a{
            color:#ffffff;
            text-decoration: none !important;
            padding-right: 2cm;
            padding-top: 2cm;
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

    .required{ 
            color: #F00000;
            padding-left: 10px;
            padding-bottom: 10px;
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
            <td> <input type="text" name="name" id="text" value="<?php if(isset($_COOKIE['name'])) echo $_COOKIE['name']; setcookie("name", "", time() - 3600); ?>" placeholder="Enter your name" REQUIRED><span class="required">*</span></td>
        </tr>
        <tr>
            <td><input type="text" name="email" id="text" value="<?php if(isset($_COOKIE['eml'])) echo $_COOKIE['eml']; setcookie("eml", "", time() - 3600); ?>" placeholder="Enter your email" REQUIRED><span class="required">*</span></td>
        </tr>
        <tr>
            <td><label>Gender: </label><input type="radio" name="radio" value="Male"><label>Male </label><input type="radio" name="radio" value="Female"><label>Female</label><span class="required">*</span></td>
        </tr>
        <tr>
            <td><input type="text" name="phone" id="phone" value="<?php if(isset($_COOKIE['phn'])) echo $_COOKIE['phn']; setcookie("phn", "", time() - 3600); ?>" placeholder="Enter your phone" pattern=".{10,}" required title="10 digits minimum"><span class="required">*</span></td>
        </tr>
        <tr>
            <td> <input type="password" name="pass" id="text" value="<?php if(isset($_COOKIE['pass'])) echo $_COOKIE['pass']; setcookie("password", "", time() - 3600); ?>" placeholder="Enter your password" REQUIRED><span class="required">*</span></td>
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