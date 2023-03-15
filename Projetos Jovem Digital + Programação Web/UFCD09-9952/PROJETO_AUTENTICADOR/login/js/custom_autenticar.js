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
				//alert(data);

				if (data == 1) {

					redirecionaPaginaAutenticada();
					$("#resultado_de_autenticacao").html("<p class='acess'>As credenciais introduzidas são válidas. Aguarde...</p>");

					//Desativar o botão 
					$("#botao_autenticar")[0].disabled = true;

					$("form")[0].reset();
				} else {
					$("#resultado_de_autenticacao").html("<p class='error'>As credenciais introduzidas são inválidas.</p>");
					redirecionaPaginaPrincipal();
				}

				/*
								//Provocar um atraso de x milésimos de segundos a executar o que está dentro da função
								$('#resultado_de_autenticacao').html(data);
								$("form")[0].reset();*/
			},
			error: function (data) {

			}

		});

		function redirecionaPaginaAutenticada() {
			window.setTimeout(function () {

				//Redireciona para outra página (link ou ficheiro)
				window.location.href = "../index.php";


			}, 3000); // 5 segundos
		}

		function redirecionaPaginaPrincipal() {
			window.setTimeout(function () {

				//Redireciona para outra página (link ou ficheiro)
				window.location.href = "../login/index.html";


			}, 3000); // 5 segundos
		}


	}


);