//Escutar o envio do formulário
jQuery('form#filmes').submit(

  function (event) {

    event.preventDefault(); //Previne reload à página

    //Serializar os valores dos campos do formulário numa variável de array
    var dados = jQuery(this).serializeArray();

    $.ajax({

      url: "validar_filme.php",
      data: dados,
      type: "POST",
      success: function (data) {
        if (data == 1) {
          //$("#resultado").html("<p>O filme existe na base de dados.</p>");
          window.location.href = "validar_filme.php";
        } else {
          $("#resultado").html("<p>O Filme não existe na base de dados.</p>");

          //REININCIA OS CAMPOS, POR DEFEITO, DO FORMULÁRIO
          $("form")[0].reset();

        }
      },
      error: function (data) {
        //CASO A EXECUSSÃO DO AJAX DÊ ERRO
      }


    });



  }


);