<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>
<body>
  <?php 

//$variavel_de_array = array("cabecalho01" => "valor 01", "Cabeçalho 2" => "valor 2");
//print_r($variavel_de_array);
//echo "<br><br><br><br>O valor da key cabecalho01 é de: ". $variavel_de_array['cabecalho01']."<br><br>";

  include("../base_de_dados.php");

  $conn = conectar_bd();

  $id = 8;

  $consulta_de_dados = consulta_de_dados_c_registo_unico($conn, $id);
  
  //Imprime informações de array das tabelas sql
  //print_r($consulta_de_dados);
  ?>
<form>
        <p>Utilizador: <input type="text" name="utilizador" id="utilizador" placeholder="Introduza o nome de Utilizador" value="<?php echo $consulta_de_dados['utilizador']; ?>"> </p>
        <p>Email: <input type="email" name="email" placeholder="Introduza o seu email" value="<?php echo $consulta_de_dados['email']; ?>"></p>

        <p>Género: <select name="genero">
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
          </select></p>

        <p>
          <label>Distritos</label>
          <?php

          //include("base_de_dados.php");
          $conn = conectar_bd();
          $distritos = distritos($conn);
        
          //echo $consulta_de_dados['distrito']; <- ID DO DISTRITO;
        
          ?>
          <select name="distritos">
            <?php
            //Ciclo repetitivo para array's
            foreach($distritos as $distrito){ ?>
            <option value="<?php echo $distrito['distritos'] ?>"><?php echo $distrito['distritos'];
             ?></option>
            <?php } ?>


          </select>
        </p>

        <p>Password: <input type="password" name="password" placeholder="Introduza a password" value="<?php echo $consulta_de_dados['password']; ?>"></p>

        <p><input type="submit" name="Enviar"></p>

      </form>

  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>
</html>