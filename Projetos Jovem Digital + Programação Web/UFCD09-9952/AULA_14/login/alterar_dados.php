<?php
  $dados = $_POST; //rebe os valores inseridos no formulário
  $id_utilizador = $dados['id_utilizador'];
  $utilizador = $dados['utilizador'];
  $email = $dados['email'];
  $genero = $dados['genero'];
  $distrito = $dados['distritos'];
  $password = md5($dados['password']); // Criptografamos uma string com md5
  $apikey= $dados['apikey'];
  $tempo = time();

  //O conjunto de caracteres ../ informa ao código para descer uma diretoria  para localizar o respetivo ficheiro 
  include("../base_de_dados.php");
  //include("./procurarfilmes.php");
  $conn = conectar_bd();
  
  atualizar_dados($conn, $id_utilizador, $utilizador, $email, $genero, $distrito, $apikey, $tempo);

  fechar_bd($conn);

?>