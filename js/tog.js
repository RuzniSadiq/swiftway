//wait for the page to load
document.addEventListener('DOMContentLoaded', () => {

    const themeStylesheet = document.getElementById('theme');
	
    const storedTheme = localStorage.getItem('theme');
    if(storedTheme){
        themeStylesheet.href = storedTheme;
    }
    const themeToggle = document.getElementById('theme-toggle');
    themeToggle.addEventListener('click', () => {
        // if it's light -> go dark
        if(themeStylesheet.href.includes('light')){
            themeStylesheet.href = '../css/dark-theme.css';
			
            
			
			
        } else {
            // if it's dark -> go light
            themeStylesheet.href = '../css/light-theme.css';
			
            
		
		
        }
        // save the preference to localStorage
        localStorage.setItem('theme',themeStylesheet.href)
		 
    })
})


	








//display appearance box on click
  function appearancehidendisplay() {
	var x = document.getElementById("opensesame");
	if (x.style.display === "none") {
	  x.style.display = "block";
	} else {
	  x.style.display = "none";
	}
  
  }

  //to hide the appearance div when clicked outside the div container
  document.addEventListener('mouseup', function(e) {
    var container = document.getElementById('opensesame');
    if (!container.contains(e.target)) {
        container.style.display = 'none';
    }
});



function myFunction() {
  var x = document.getElementById("mobilesidebar");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

}


