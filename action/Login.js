$('#formSubmit').on('submit', function(event) {
	event.preventDefault();
	$.ajax({
		url         : "./Ajax/Login/",
	    type        : "POST",
	    data        : new FormData(this),
	    contentType : false,
	    cache       : false,
	    processData : false,
	    success		: function(res){
	    	var json = JSON.parse(res);
	    	if(json.err == true){
				notif(json.ket, " ", json.icon)	
	    	}else{
	    		window.location.href = './Welcome'
	    	}
	    }
	})
});
function notif(title, text, icon) {
	swal({ 
      	title: title,
      	text: text,
      	icon: icon,
      	buttons: false,
      	timer: 1500,
	});
}