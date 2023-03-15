//Escutar o envio do formulário
jQuery('form#autenticar').submit(

	function (event) {

		event.preventDefault();


		var dados = jQuery(this).serializeArray();

		$.ajax({

			url: "autenticar.php",
			data: dados,
			type: "POST",
			success: function (data) {
				alert(data);

				if (data == 1) {

					window.setTimeout(function () {

						//Redireciona para outra página (link ou ficheiro)
						window.location.href = "dados_utilizador.php";

					}, 3000); // 5 segundos

					$("#resultado_de_autenticacao").html("As credenciais introduzidas são válidas. Aguarde...");

					//Desativar o botão 
					$("#botao_autenticar")[0].disabled = true;

					$("form")[0].reset();
				} else {
					$("#resultado_de_autenticacao").html("As credenciais introduzidas são inválidas.");
				}

				/*
								//Provocar um atraso de x milésimos de segundos a executar o que está dentro da função
								$('#resultado_de_autenticacao').html(data);
								$("form")[0].reset();*/
			},
			error: function (data) {

			}

		});



	}


);