<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  include("../base_de_dados.php");
  $conn = conectar_bd();
 
  $dados = resultados_obtidos($conn);
 ?>
<h1>Dados do Utilizador</h1>
<?php
          
foreach($dados as $dado){ ?>
<p value="<?php echo $dado['id'] ?>"><?php echo $dado['utilizador'];?></p>
<p value="<?php echo $dado['id'] ?>"><?php echo $dado['email'];?></p>
<p value="<?php echo $dado['id'] ?>"><?php echo $dado['password'];?></p>
<p value="<?php echo $dado['id'] ?>"><?php echo $dado['genero'];?></p>
<p value="<?php echo $dado['id'] ?>"><?php echo $dado['distritos'];?></p>
<p value="<?php echo $dado['id'] ?>"><?php echo $dado['tempo'];?></p>
<?php } ?>
</body>
</html>