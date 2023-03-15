<?php
  if(!empty($_POST)){ //Valida se o meu parâmetro não está vazio
  // RECEBER OS DADOS PELO MÉTODO POST DO AJAX
  // OS CAMPOS key's E OS VALORES SÃO ATRIBUÌDAS AO ARRAY
  $dados = $_POST;

  $utilizador = $dados['utilizador'];

  $email = $dados['email'];
  
  $genero = $dados['genero'];

  $password = md5($dados['password']); // Criptografamos uma string com md5

  $tempo = time(); //Apresenta na variável tempo o time em formato UNIX


	//UTILIZAR UM FICHEIRO  DE SCRIPT EXTERNO
	include("base_de_dados.php");
	
	//CHAMAR A FUNÇÃO  PARA -> LIGAR À BD
	$conn = conectar_bd();

	//CHAMAR A FUNÇÃO PARA -> INSERIR REGISTRO NA BASE DE DADOS
	inserir_registro($conn, $utilizador, $email, $password, $genero, $tempo);

  //CHAMAR A FUNÇÃO PARA -> TERMINAR A LIGAÇÃO NA BASE DE DADOS
  fechar_bd($conn);
  
  } else{
    echo "Tentativa de acesso indevida.";
  }
?>