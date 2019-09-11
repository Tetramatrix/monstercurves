$(document).ready(function(){
	 $.get("https://cors-anywhere.herokuapp.com/https://tetramatrix.github.io/awvd/liste.html",function(data) {
 			 //console.log(data)
  		$("#others").html(data);
  	})
});	