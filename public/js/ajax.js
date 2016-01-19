$(document).ready(function(){
	var timeout;
	$("#email").blur(function(){
		clearTimeout(timeout);

		timeout = setTimeout(function() {
               $.ajax({
					type: "POST",
					url: "/check",
					data: {'email':$('input[name=email]').val(), '_token': $('input[name=_token]').val()},
					dataType: "json",
					success: function(data){
						//alert(data);
						$("#status").html(data);
					}
				});    
            }, 800); //timeout set as 800ms, i.e. ajax request will be processed once in 800ms

		
	});
});
