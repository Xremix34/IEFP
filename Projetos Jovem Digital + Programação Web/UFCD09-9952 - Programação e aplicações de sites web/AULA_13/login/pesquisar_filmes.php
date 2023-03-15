<?php 
session_start();

if ( isset($_SESSION['autenticacao'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Procura de Filmes</title>
</head>
<body>
  <h1>Procurar de Filmes</h1>

  <form action="validar_filme.php" method="post">
  <input type="text" name="filme" placeholder="Insira o nome de um filme">
  <input type="submit" value="Procurar">
  </form>

  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/custom_filmes.js"></script>
</body>
</html>

<?php 

} else{
 echo "Não fez a autenticação de forma correta ou está a tentar aceder ao conteúdo de forma indevida.";
}

?>

