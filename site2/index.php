<?php
//Connects to your Database 
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("login") or die(mysql_error()); 

 //checks cookies to make sure they are logged in 
 if(isset($_COOKIE['name'])){ 

 	$username = $_COOKIE['name']; 
 	$pass = $_COOKIE['pass']; 
 	$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error()); 

 	while($info = mysql_fetch_array( $check )){ 

		//if the cookie has the wrong password, they are taken to the login page 
 		if ($pass != $info['password']){
			header("Location: login.php"); 
 		}
		//otherwise they are shown the admin area
		else{

 		}
	}
}
else{ //if the cookie does not exist, they are taken to the login screen 
	header("Location: login.php"); 
}
?>