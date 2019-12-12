$(function(){

	$("#login_form").submit(function(){

		$.ajax({
			type: "post",
			url: BASE_URL + "login/ajax_login",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function(){
				clearErrors();
			},
			success: function(json){
				if(json["status"] == 1){
					clearErrors();
					window.location = BASE_URL + "restrict/";
				}else{
					showErrors(json["error_list"]);
				}
			},
			error: function(response){
				console.log(response);
			}
		})

		return false;

	})

})