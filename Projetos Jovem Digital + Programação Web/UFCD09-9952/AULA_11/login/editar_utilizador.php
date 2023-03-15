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

  session_start();
  $id = $_SESSION['id_utilizador'];
  
  echo "Variavél de sessão: " . $id;

  $consulta_de_dados = consulta_de_dados_c_registo_unico($conn, $id);
  
  //Imprime informações de array das tabelas sql
  //print_r($consulta_de_dados);
  ?>
<form id="atualizar">
        <p>Utilizador: <input type="text" name="utilizador" id="utilizador" placeholder="Introduza o nome de Utilizador" value="<?php echo $consulta_de_dados['utilizador']; ?>"> </p>
        <p>Email: <input type="email" name="email" placeholder="Introduza o seu email" value="<?php echo $consulta_de_dados['email']; ?>"></p>

        <!--<p>Género: <select name="genero">
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
          </select></p>-->

          <label>Genero</label>
          
          <p>
          <?php
          $conn = conectar_bd();
            $generos = generos($conn);
          ?>
          <select name="genero">
            <?php 
            foreach($generos as $genero){ ?>
              <option value="<?php echo $genero['id'] ?>" <?php if($genero['id'] == $consulta_de_dados['genero']){echo "selected";} ?> >
              
              <?php echo $generos['genero'];?>
            
            </option>
              <?php } ?>
            ?>
           
          </select>
           </p>

        <p>
          <?php
          $conn = conectar_bd();
          echo "<p>ID do distrito do utilizador:" . $consulta_de_dados['id']."</p>"; 
          // <- ID DO DISTRITO
          $nome_do_distrito = nome_do_distrito($conn, $consulta_de_dados['distritos']);
          
          echo "<p>ID: " . $nome_do_distrito['id']."</p>";
          echo "<p>NOME: " . $nome_do_distrito['distritos']."</p>";

          ?></p>

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
            <option value="<?php echo $distrito['id'] ?>" <?php if($distrito['id'] == $consulta_de_dados['distritos']){echo "selected";} ?> >
            
            <?php echo $distrito['distritos'];?>
          
          </option>
            <?php } ?>


          </select>
        </p>

        <p>Password: <input type="password" name="password" placeholder="Introduza a password" value="<?php echo $consulta_de_dados['password']; ?>"></p>

        <p><input type="submit" name="Atualizar"></p>

      </form>

  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/custom_atualizar.js"></script>
</body>
</html>