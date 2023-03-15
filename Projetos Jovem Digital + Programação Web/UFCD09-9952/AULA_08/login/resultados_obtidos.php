<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<h1>Dados do Utilizador</h1>
  <?php

  include("../base_de_dados.php");

  $conn = conectar_bd();

  $id = 4;

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
 ?>
</body>
</html>