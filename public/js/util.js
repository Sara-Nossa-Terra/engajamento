const BASE_URL = "http://localhost/engajamento/";

function clearErrors(){
	$(".is-invalid").removeClass("is-invalid");
	$(".help-block").html("");
}

function showErrors(error_list){
	clearErrors();

	$.each(error_list, function(id, message){
		$(id).addClass("is-invalid");
		$(id).parent().siblings(".help-block").html(message);
	})
	// alert("teste");
}