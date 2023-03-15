<?php
  
  // RECEBER OS DADOS PELO MÉTODO POST DO AJAX
  // OS CAMPOS key's E OS VALORES SÃO ATRIBUÌDAS AO ARRAY
  $dados = $_POST;

  $utilizador = $dados['utilizador'];

  $email = $dados['email'];
  
  $genero = $dados['genero'];

  $password = $dados['password'];

  $tempo = time();

// CRIA UM FICHEIRO
$ficheiro = fopen("ficheiros/".$tempo."-dados_do_utilizador.txt", "w");
// Modo 'w' cria ou abre e regrava o conteúdo do ficheiro
// Modo 'a' acrescenta conteúdo ao ficheiro

//ESCREVE NO FICHEIRO 
fwrite($ficheiro, "Utilizador: ".$utilizador." Email: ".$email." Género: ".$genero." Password: ".$password);

//GUARDAR E FECHAR O FICHEIRO
fclose($ficheiro);


?>