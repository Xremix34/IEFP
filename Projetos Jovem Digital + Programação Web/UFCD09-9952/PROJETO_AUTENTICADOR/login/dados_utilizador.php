<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <script src="../js/bootstrap.min.js"></script>
<?php 

session_start();
if ( isset($_SESSION['autenticacao'])) {

?>

  <title>Informação do Utilizador</title>
</head>
<body style='background-color: #f0ffff;'>
  <h1 class="titulo">Informação do Utilizador</h1>
  <div class="right-logout">
  <a href="logout.php"><button type="button" class="btn btn-lg btn-secondary btn-block">Logout</button></a>
  </div>
<div class="conteudo">
  <?php

  include("../base_de_dados.php");

  $conn = conectar_bd();

  $id = $_SESSION['user_id'];

  $consulta_de_dados = consulta_de_dados($conn, $id);
        
foreach($consulta_de_dados as $dado){ 
 echo "<p>ID: ".$dado['id']."</p>";
 echo "<p>User: ".$dado['utilizador']."</p>";
 echo "<p>Email: ".$dado['email']."</p>";
 echo "<p>Password: ".$dado['password']."</p>";
 echo "<p>Género: ".$dado['genero']."</p>";
 echo "<p>Distrito: ".$dado['distritos']."</p>";
 echo "<p>Timestamp: ".$dado['tempo']."</p>";

echo "<p>Data: ". date("d-m-Y H:i:s", $dado['tempo']);

echo "<p>Dia: " . date("d", $dado['tempo']). "</p>";
echo "<p>Mês: " . date("m", $dado['tempo']). "</p>";
echo "<p>Ano: " . date("Y", $dado['tempo']). "</p>";

echo "<p>Hora: " . date("H", $dado['tempo']). "</p>";
echo "<p>Minutos: " . date("i", $dado['tempo']). "</p>";
echo "<p>Segundos: " . date("s", $dado['tempo']). "</p>";
 } 
 fechar_bd($conn);

 $_SESSION['id_utilizador'] = $dado['id'];

 ?>

 <form method="post" action="editar_utilizador.php">
  <input type="submit" class="btn btn-lg btn-secondary btn-block btn-center" value="Atualizar dados">
 </form>

</div>
<?php 

} else{
  echo "<p class='error'>Não fez a autenticação de forma correta ou está a tentar aceder ao conteúdo de forma indevida.</p>";
  echo "<div class='imagem'><img src='../imagens/triste.jpeg'></img></div>";
}

?>
