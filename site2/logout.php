<?php 
 $past = time() - 100; 
 //this makes the time in the past to destroy the cookie 
 setcookie('name', gone, $past); 
 setcookie('pass', gone, $past); 
 header("Location: Home.php"); 
 ?> 