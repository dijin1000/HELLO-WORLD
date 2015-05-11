<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="CSS/Standard.css">
		<title>
		</title>
		<script src="jquery-2.1.3.min.js"></script>
		<script src="Javascript/Sidebar.js"></script>
	</head>
	  
	  <body>
			<div id = "SiteContainer">
				 <div id = "BannerBackground">
						<div id = "BannerLeft" class="banner">
						</div>

						<div id = "BannerCenter" class="banner">
						</div>
						
						<div id = "BannerRight" class="banner">
						</div>
						<div id = "Logo">
						</div>
				</div>
				
				<div id="menuContainer">
					<div id="ToggleButton" onclick="toggle_visibility('menu');"></div>
					 
					<div id="menu" >
						<?php
						//Connects to your Database 
						mysql_connect("localhost", "root", "") or die(mysql_error()); 
						mysql_select_db("login") or die(mysql_error()); 
						
						if(isset($_COOKIE['name'])){ //if there is, it logs you in and directes you to the members page
							$username = $_COOKIE['name']; 
							$pass = $_COOKIE['pass'];
							$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());

							while($info = mysql_fetch_array( $check )){
								if ($pass != $info['password']){}
								else{
									?> 
									<button onclick="location.href = 'Upload.php'" class = "Links" >Upload</button>
									<button onclick="location.href = 'Logout.php'" class = "Links">Logout</button>
									<?php
								}
							}
						 }
						 else{
							?>
							<button onclick="location.href = 'login.php'" class = "Links" >Login</button>
							<button onclick="location.href = 'Register.php'" class = "Links" >Register</button>
							<?php
						 }
						 ?>
					</div>
				</div>
				<div id="Content">

				</div>
				<script>
				$.getJSON('items.json', function(data) {
					$.each(data.items, function(i, f) {
						$imgtext = "";
						if(f.thumbnail == "self") {
							$imgtext = "";
						} else {
							$imgtext = '<div class = "picture">' +
							'<img height = 100 src="' + f.thumbnail + '">' +
							'</div>';
							if(f.source == "self") {
								$imgtext = '<div class = "picture">' +
								'<img height = 100 src="getpicture.php?fid=' + f.thumbnail + '" >' +
								'</div>';
							}
						} 
						$("#Content").append(
						'<div class = "item">' +  
						'<div class = "text">' +
						'<a target="tab" href="' + f.url + '">' + f.title + '</a><br>' +
						'</div>'+
						$imgtext +
						'</div>');
					})
				})
				</script>
		</div>
	</body>
</html>

