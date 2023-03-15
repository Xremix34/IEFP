<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./css/styles.css">
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
  <script src="../js/bootstrap.min.js"></script>

  <title>Formulário com jQuery</title>
</head>

<body>
  <section class="centrar_conteudo" style="background-color: #f0ffff;">
  <h1>Formulário de Registro</h1>
    <div class="wrapper">
      <form class="form-signin">
        <?php
        include("base_de_dados.php");
          $conn = conectar_bd();
          ?>
        <h2 class="form-signin-heading">Registro</h2>
        <label class="campos">Utilizador</label>
        <p><input type="text" class="form-control" name="utilizador" id="utilizador" placeholder="Introduza o nome de Utilizador" required> </p>
        <label class="campos">Email</label>
        <p><input type="email" class="form-control" name="email" placeholder="Introduza o seu email" required></p>


          <p>
          <label class="campos">Generos</label>
          <?php
          
          $generos = generos($conn);
          
          ?>
          <select class="btn btn-light dropdown-toggle" name="genero" required>
            <?php
            //Ciclo repetitivo para array's
            foreach($generos as $genero){ ?>
            <option value="<?php echo $genero['id'] ?>"><?php echo $genero['genero'];
             ?></option>
            <?php } ?>
          </select>
        </p>

        <p>
          <label class="campos">Distritos</label>
          <?php
          $distritos = distritos($conn);        
          ?>
          <select class="btn btn-light dropdown-toggle" name="distritos" required>
            <?php
            //Ciclo repetitivo para array's
            foreach($distritos as $distrito){ ?>
            <option value="<?php echo $distrito['id'] ?>"><?php echo $distrito['distritos'];
             ?></option>
            <?php } ?>

          </select>
        </p>
        
        <label class="campos">Api Key</label>
        <p><input type="text" class="form-control" name="apikey" placeholder="Código da Api Key" required></p>

        <label class="campos">Password</label>
        <p><input type="password" class="form-control" name="password" placeholder="Introduza a password" required></p>

        <p><input type="submit" class="btn btn-lg btn-secondary btn-block btn-center" value="Enviar"> <a class="url-login" href="login/index.html">Faça seu login</a></p>

      </form>

      <p id="resultado"></p>
    </div>
    <?php fechar_bd($conn)?>
  </section>

  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>