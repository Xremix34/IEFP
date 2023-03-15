//Escutar o envio do formulário
jQuery('form').submit(

	function (event) {

		event.preventDefault();


		var dados = jQuery(this).serializeArray();

		$.ajax({

			url: "autenticar.php",
			data: dados,
			type: "POST",
			success: function (data) {

				$('#resultado_de_autenticacao').html(data);
				$("form")[0].reset();



			},
			error: function (data) {

			}

		});



	}


);