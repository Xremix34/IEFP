//Escutar o envio do formulário
jQuery('form').submit(

  function (event) {
    event.preventDefault(); // Previne reload à página

    //Serializar os dados do formulário numa variàvel 
    var dados = jQuery(this).serializeArray();
    console.log(dados);

    /* Obter valor de um campo específico do formulário
    var campo01 = $('campo01').val();
    alert(campo01);*/

    $.ajax({

      url: "ficheiro.php",
      data: dados,
      type: "POST",
      success: function (data) {
        //CASO A EXECUSSÃO DO AJAX SEJA BEM SUCEDIDA

        //MOSTRAR UMA MENSAGEM AO UTILIZADOR
        $('#resultado').html("<p>Formulário enviado com sucesso!</p>");

        //REINICIAR OS CAMPOS, POR DEFEITO, DO FORMULÁRIO
        $("form")[0].reset();
      },
      error: function (data) {
        //CASO A EXECUSSÃO DO AJAX DÊ ERRO
      }
    });

  }
);
