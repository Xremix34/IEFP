<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>

  <?php
  session_start();
if ( isset($_SESSION['autenticacao'])) {
  //session_destroy();
?>
  <title>Procura de Filmes</title>
</head>

<body>

  <h1 class="titulo">Procurar de Filmes</h1>
  <div class="right-logout">
  <a href="logout.php"><button type="button" class="btn btn-lg btn-secondary btn-block">Logout</button></a>
  </div>
  <div class="conteudo">
    <form action="validar_filme.php" method="post" class="form-signin bg-dark">
      <div class="espacamento">
        <input type="text" class="form-control text-center" name="filme" placeholder="Insira o nome de um filme">
      </div>
      <div class="centrar-butao-login">
        <input type="submit" class="btn btn-lg btn-secondary btn-block btn-center" value="Procurar">
      </div>
  </div>
</form>

  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/custom_filmes.js"></script>
</body>

</html>

<?php 

} else{
  echo "<p class='error'>Não fez a autenticação de forma correta ou está a tentar aceder ao conteúdo de forma indevida.</p>";
  echo "<div class='imagem'><img src='./imagens/triste.jpeg'></img></div>";
}

?>