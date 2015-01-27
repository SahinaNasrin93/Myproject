<html>
<head>
	<title>Sign-Up</title>
	<style>

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

    #upar{
	       width: 100%;
	       height: 10%;
	       background : #2A2A2A;
	       overflow:hidden; 
	       padding:0;
           margin:0;
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
    </div>
    <div id="Content">
        <center>
        <label><h2><div><?php echo $_GET['msg']; ?></div></h2></label>
    </center>
    </div>
</body>
</html>