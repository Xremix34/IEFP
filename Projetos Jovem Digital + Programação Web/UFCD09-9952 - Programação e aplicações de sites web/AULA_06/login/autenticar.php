<?php
if(!empty($_POST)){
  $dados = $_POST;
  $email = $dados['email'];
  $password = $dados['password'];

  //O conjunto de caracteres ../ informa ao código para descer uma diretoria  para localizar o respetivo ficheiro 
  include("../base_de_dados.php");

  $conn = conectar_bd();
  
  consultar_autenticacao($conn, $email, $password);

  fechar_bd($conn);
}
?>