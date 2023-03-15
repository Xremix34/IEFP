<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" type="text/css" href="css/style.css">-->
  <title>Formulário com jQuery</title>
</head>

<body>
  <section class="centrar_conteudo">
    <div class="personalizar_login">
      <h1>Formulário de identificação</h1>
      <form>
        <p>Utilizador: <input type="text" name="utilizador" id="utilizador" placeholder="Introduza o nome de Utilizador" required> </p>
        <p>Email: <input type="email" name="email" placeholder="Introduza o seu email" required></p>

        <p>Género: <select name="genero" required>
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
          </select></p>

        <p>
          <label>Distritos</label>
          <?php
          include("base_de_dados.php");
          $conn = conectar_bd();
          $distritos = distritos($conn);
          
          //Para retornar o valor de um array
          //print_r($distritos);
          //var_dump($distritos);

          ?>
          <select name="distritos" required>
            <?php
            //Ciclo repetitivo para array's
            foreach($distritos as $distrito){ ?>
            <option value="<?php echo $distrito['distritos'] ?>"><?php echo $distrito['distritos'];
             ?></option>
            <?php } ?>


          </select>
        </p>

        <p>Password: <input type="password" name="password" placeholder="Introduza a password" required></p>

        <p><input type="submit" name="Enviar"></p>

      </form>

      <p id="resultado"></p>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>