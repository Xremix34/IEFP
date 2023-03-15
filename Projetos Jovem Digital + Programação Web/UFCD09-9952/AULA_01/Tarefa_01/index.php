<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tarefa 01</title>
</head>
<body>

<?php
  echo "<h1>Bem-vindo à minha primeira página desenvolvida em PHP </h1>";

  define("NOME_DO_FORMANDO", "Élio");
  echo "<p>O meu nome é ".NOME_DO_FORMANDO."</p>";

  // Para somar

  $num1 = 34;
  $num2 = 20;


  //Variáveis de Operações
  $operador_soma = "Soma";
  $operador_subtracao = "Subtração";
  $operador_multiplicacao = "Multiplicação";
  $operador_divisao = "Divisão";

   //Operações Matemáticas
  $total_da_soma = $num1 + $num2;
  $total_da_subtracao = $num1 - $num2;
  $total_da_multiplicacao = $num1 * $num2;
  $total_da_divisao = $num1 / $num2;

   //Apresentação das Mensagens
  echo "<p>A ".$operador_soma." de ".$num1." e ".$num2." é ".$total_da_soma.".</p>";
  echo "<p>A ".$operador_subtracao." de ".$num1." e ".$num2." é ".$total_da_subtracao.".</p>";
  echo "<p>A ".$operador_multiplicacao." de ".$num1." e ".$num2." é ".$total_da_multiplicacao.".</p>";
  echo "<p>A ".$operador_divisao." de ".$num1." e ".$num2." é ".$total_da_divisao.".</p>";
?>
  
</body>
</html>