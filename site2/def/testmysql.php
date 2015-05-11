<?php 
$mysqli = mysqli_init();
$link = mysql_connect('hostname','dbuser','dbpassword'); 
if (!$mysqli->real_connect('localhost','root','')) { 
	die('Could not connect to MySQL: ' . mysqli_connect_error()); 
} 
echo 'Connection OK'; mysql_close($link); 
?> 