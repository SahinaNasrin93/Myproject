<?php
session_start();

if (isset($_SESSION['user'])) {
	session_destroy();
header ("Location: index.php");
}
else if (isset($_SESSION['super'])) {
	session_destroy();
header ("Location: index.php");
}
?>