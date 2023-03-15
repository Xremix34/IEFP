//Escutar o envio do formulário
jQuery('form#actualizar').submit(

	function (event) {

		event.preventDefault();


		var dados = jQuery(this).serializeArray();

		$.ajax({

			url: "alterar_dados.php",
			data: dados,
			type: "POST",
			success: function (data) {
				//alert("Os seus dados foram editados.");

				if (data == 1) {

					window.setTimeout(function () {

						//Redireciona para outra página (link ou ficheiro)
						window.location.href = "editar_utilizador.php";

					}, 3000); // 5 segundos

					$("#resultado_de_autenticacao").html("<p class='acess'>As credenciais introduzidas são válidas. Aguarde...</p>");

					//Desativar o botão 
					$("#botao_autenticar")[0].disabled = true;

					$("form")[0].reset();
				} else {
					$("#resultado_de_autenticacao").html("<p class='error'>As credenciais introduzidas são inválidas.</p>");
				}

			},
			error: function (data) {

			}

		});



	}


);