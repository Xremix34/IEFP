<?php
if(!empty($_POST)){
  $dados = $_POST;
  $utilizador = $dados['utilizador'];
  $password = $dados['password'];

  //O conjunto de caracteres ../ informa ao código para descer uma diretoria  para localizar o respetivo ficheiro 
  include("../base_de_dados.php");
  //include("./procurarfilmes.php");
  $conn = conectar_bd();
  
  consultar_autenticacao($conn, $utilizador, $password);

  fechar_bd($conn);
}
?>