<?php
$username = "root";
$password = [null];
$hostname = "localhost";
$dbname = "test";

$dbhandle = mysql_connect($hostname, $username, $password, $test)
	or die("Unable to connect to MySQL");
echo "Connected to MySQL<br>";

$sql = "INSERT INTO account_details (User_Name, User_Pass, User_Email, Description, Amount_Of_Uploads, Creation_Date)
VALUES ( $name, $pass , $mail , ' ' , '0', CURRENT_TIME()); 

	
