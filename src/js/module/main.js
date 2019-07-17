class Main {
 constructor() {
  this.init();
 }

 init() {
 		
 	var portfolioPostsBtn = document.getElementById("portfolio-posts-btn");
	var portfolioPostsContainer = document.getElementById("portfolio-posts-container");
 
	if (portfolioPostsBtn) {
	  portfolioPostsBtn.addEventListener("click", function() {
	    var ourRequest = new XMLHttpRequest(),
	    	 method = 'GET',
  			url = '/floodcontrolasia/wp-json/wp/v2/posts?categories=12&order=asc';
	    ourRequest.open(method, url, true);
	    ourRequest.onload = function() {
	      if (ourRequest.status >= 200 && ourRequest.status < 400) {
	        var data = JSON.parse(ourRequest.responseText);
	        createHTML(data);
	        portfolioPostsBtn.remove();
	      } else {
	        console.log("We connected to the server, but it returned an error.");
	      }
	    };

	    ourRequest.onerror = function() {
	      console.log("Connection error");
	    };

	    ourRequest.send();
	  });
	}

	function createHTML(postsData) {
	  var ourHTMLString = '';

	  for (var i = 0; i < postsData.length; i++) {

	  	// ourHTMLString += postsData[i] + "<br>";
	  	  ourHTMLString += "<h2>" + postsData[i].title.rendered + "</h2>";
	  	  ourHTMLString += postsData[i].content.rendered;


	  	// console.log(postsData[i]);
	  }
	  portfolioPostsContainer.innerHTML = ourHTMLString;
	}


 }
}

export default Main;