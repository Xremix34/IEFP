
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

  //echo "Sim, existe a variável de sessão definida.";
  //session_destroy();
?>


  <title></title>
</head>
<body>
  <?php 

include("../base_de_dados.php");

  $conn = conectar_bd();

  $id = $_SESSION['id_utilizador'];
  
  echo "Variavél de sessão: " . $id;

  $consulta_de_dados = consulta_de_dados_c_registo_unico($conn, $id);

  ?>
<div class="wapper" style='background-color: #f0ffff;'>
  <h1 class="titulo">Editar dados do Utilizador</h1>
  <div class="conteudo">
    <form class="form-signin">
      <label class="campos">Utilizador</label>
        <p><input type="text" class="form-control" name="utilizador" id="utilizador" placeholder="Introduza o nome de Utilizador" value="<?php echo $consulta_de_dados['utilizador']; ?>"> </p>
        <label class="campos">Email</label>
        <p><input type="email" class="form-control" name="email" placeholder="Introduza o seu email" value="<?php echo $consulta_de_dados['email']; ?>"></p>
  
        <p>
          <label class="campos">Genero</label>
          <?php
            $generos = generos($conn);
          ?>

          <select class="btn btn-light dropdown-toggle" name="genero">
            <?php 
            foreach($generos as $genero){ ?>
              <option value="<?php echo $genero['id'] ?>" <?php if($genero['id'] == $consulta_de_dados['genero']){echo "selected";} ?> >
              
              <?php echo $genero['genero'];?>
            
            </option>
              <?php } ?>
            
          </select>
           </p>

        <p>

        <p>
          <label class="campos">Distritos</label>
          <?php
          $distritos = distritos($conn);
          ?>
          <select class="btn btn-light dropdown-toggle" name="distritos">
            <?php
            //Ciclo repetitivo para array's
            foreach($distritos as $distrito){ ?>
            <option value="<?php echo $distrito['id'] ?>" <?php if($distrito['id'] == $consulta_de_dados['distritos']){echo "selected";} ?> >
            
            <?php echo $distrito['distritos'];?>
          
          </option>
            <?php } ?>

          </select>
        </p>
        
        <label class="campos">Password</label>
        <p><input type="password" class="form-control" name="password" placeholder="Introduza a password" value="<?php echo $consulta_de_dados['password']; ?>"></p>
            
        <p><input type="hidden" value = "<?php echo $_SESSION['id_utilizador'];?>" name="id_utilizador"></p>

        <label class="campos">Api Key</label>
        <p><input type="text" class="form-control" name="apikey" placeholder="Introduza a ApiKey" value="<?php echo $consulta_de_dados['apikey']; ?>"></p>
        <p><input type="submit" class="btn btn-lg btn-secondary btn-block btn-center" name="actualizar" value="Atualizar Dados"></p>
       
      </form>
      <form id="actualizar">
        </div>
      </div>
  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/custom_atualizar.js"></script>
</body>
</html>

<?php
fechar_bd($conn);
} else{
  echo "<p class='error'>Não fez a autenticação de forma correta ou está a tentar aceder ao conteúdo de forma indevida.</p>";
  echo "<div class='imagem'><img src='../imagens/triste.jpeg'></img></div>";
}

?>