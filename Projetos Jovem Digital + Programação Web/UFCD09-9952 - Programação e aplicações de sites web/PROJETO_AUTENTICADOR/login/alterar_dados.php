<?php
session_start();
if ( isset($_SESSION['autenticacao'])) {

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

} else{
  echo "<p class='error'>Não fez a autenticação de forma correta ou está a tentar aceder ao conteúdo de forma indevida.</p>";
  echo "<div class='imagem'><img src='../imagens/triste.jpeg'></img></div>";
}
?>