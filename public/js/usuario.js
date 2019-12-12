$(function(){

	$("#novo_usuario").submit(function(){

		$("#loading").show();

		$.ajax({
			type: "post",
			url: BASE_URL + "novoUsuario/ajax_novo_usuario",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function(){
				clearErrors();
			},
			success: function(response){
				if(response["status"]){
					$("#user_alert").html("Usuário criado com sucesso!").show('fade');
					setTimeout(function(){
						$("#loading").hide();
						window.location = BASE_URL + "usuarios/";
			    }, 1500);
				}else{
					$("#loading").hide();
					showErrors(response["error_list"]);
					// alert("teste");
				}
			},
			error: function(response){
				console.log(response);
			}
		})

		return false;

	})

	$("#editar_usuario").submit(function(){

		$("#loading").show();

		$.ajax({
			type: "post",
			url: BASE_URL + "editarUsuario/ajax_editar_usuario",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function(){
				clearErrors();
			},
			success: function(response){
				if(response["status"]){
					$("#user_alert").html("Usuário modificado com sucesso!").show('fade');
					setTimeout(function(){
						$("#loading").hide();
						window.location.reload();
			    }, 1500);
				}else{
					$("#loading").hide();
					showErrors(response["error_list"]);
				}
			},
			error: function(response){
				console.log(response);
			}
		})

		return false;

	})

})