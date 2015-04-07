function toggle_visibility(id) {
   var e = document.getElementById(id);
   var b = document.getElementById("ToggleButton");
   var c = document.getElementById("menuContainer")
   if(e.style.display == 'block'){
		e.style.display = "none";		
		b.style.width = "100%";
		c.style.width = "9%";
		c.style.marginLeft = "91%";
		b.style.background = "url('Show&Hide.png') 50px 0px no-repeat";
		b.style.backgroundSize = "80px 60px";
	  }
   else {
		e.style.display = "block";				
		b.style.width = "30%";
		c.style.width ="25%";
		c.style.marginLeft = "75%";
		b.style.background = "url('Show&Hide.png') -50px 0px no-repeat";
		b.style.backgroundSize = "80px 60px";
	}
}