<?php
$servername='localhost';
	$username='root';
	$password='innoraft';

	$conn=mysql_connect($servername,$username,$password);
	mysql_select_db('login');
	if(!$conn) {
    		die("Connection failed: " . mysql_error());
		}
?>