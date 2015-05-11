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
						<ul>
							<li><a href = "Upload.php" >Upload</a></li>
						</ul>
					</div>
				</div>
				<div id="Content">
				<img src="getpicture.php?fid=6">
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

