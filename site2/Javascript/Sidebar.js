function toggle_visibility(id) {
   var e = document.getElementById(id);
   var b = document.getElementById("ToggleButton");
   var c = document.getElementById("menuContainer")
   if(e.style.display == 'block'){
		e.style.display = "none";
		b.style.float = "right";
		b.style.background = "url('./Images/show.png') no-repeat";
		b.style.backgroundSize = "20px 20px";
	  }
   else {
		b.style.float = "left";
		e.style.display = "block";
		b.style.background = "url('./Images/hide.png') no-repeat";
		b.style.backgroundSize = "20px 20px";
	}
}
