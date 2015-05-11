<?php 
//Connects to your Database 
mysql_connect("localhost", "root", "") or die(mysql_error()); 
mysql_select_db("login") or die(mysql_error()); 

//This code runs if the form has been submitted
if (isset($_POST['submit'])) { 

//This makes sure they did not leave any fields blank
if (!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2'] | !$_POST['email']) {
	die('You did not complete all of the required fields');
}

// checks if the username is in use
if (!get_magic_quotes_gpc()) {
	$_POST['username'] = addslashes($_POST['username']);
}

$usercheck = $_POST['username'];
$check = mysql_query("SELECT username FROM users WHERE username = '$usercheck'") 
or die(mysql_error());
$check2 = mysql_num_rows($check);

//if the name exists it gives an error
if ($check2 != 0) {
 	die('Sorry, the username '.$_POST['username'].' is already in use.');
}

// this makes sure both passwords entered match
if ($_POST['pass'] != $_POST['pass2']) {
	die('Your passwords did not match. ');
}

// here we encrypt the password and add slashes if needed
$_POST['pass'] = md5($_POST['pass']);

if (!get_magic_quotes_gpc()) {
	$_POST['pass'] = addslashes($_POST['pass']);
	$_POST['username'] = addslashes($_POST['username']);
}

// now we insert it into the database
$hash = md5( rand(0,1000) );
$insert = "INSERT INTO users (username, password, email, active, hash) VALUES ('".$_POST['username']."', '".$_POST['pass']."', '".$_POST['email']."', '0', '$hash')";
$add_member = mysql_query($insert);

$to      = $_POST['email']; // Send email to our user
$subject = 'Signup | Verification'; // Give the email a subject 
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$_POST['username'].'
Password: '.$_POST['pass'].'
------------------------
 
Please click this link to activate your account:
http://localhost/Login/verify.php?email='.$_POST['username'].'&hash='.$hash.'
 
'; // Our message above including the link
                     
$headers = 'From:noreply@localhost.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
?>


 <h1>Registered</h1>

 <p>Thank you, you have registered - you can <a href="login.php">login</a> after activating your account by verifying your email.</p>

 <?php 
 }

 else 
 {	
 ?>
 
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

 <table border="0">

 <tr><td>Username:</td><td>

 <input type="text" name="username" maxlength="60">

 </td></tr>
 
 <tr><td>Email:</td><td>

 <input type="text" name="email" maxlength="60">

 </td></tr>

 <tr><td>Password:</td><td>

 <input type="password" name="pass" maxlength="10">

 </td></tr>

 <tr><td>Confirm Password:</td><td>

 <input type="password" name="pass2" maxlength="10">

 
 <tr><th colspan=2><input type="submit" name="submit" 
value="Register"></th></tr> </table>

 </form>

 By registering an account, you automatically agree to our <a href="free-website-terms-and-conditions.pdf">terms and conditions</a>
 <?php
 }
 ?> 