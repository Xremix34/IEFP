<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>A minha primeira página em PHP</title>
</head>
<body>

	<?php //Inicio da declaração de PHP

		//Todo o código PHP deve estar dentro deste conjunto de caracteres

		/* Comentário com
		multiplas linhas
		usamos este conjunto de
		caracteres para iniciar e
		terminar */


	//Fim da declaração de PHP
	?>

	<!--Os comentários em HTML não são feitos da mesma forma-->

	<h1>Código PHP</h1>

	<?php

		//https://www.w3schools.com/php/php_echo_print.asp

		//Enviar para o utilizar informação
		echo "Esta é a minha mensagem"; //utilizando duplas aspas

		echo "<br>"; //incluir tags html para serem interpretadas no navegador

		echo 'Esta mensagem também é válida'; //utilizando aspas simples

		echo "<h2>Conjugação de tag's e texto</h2>"; //Utilização de tag's


		//https://www.w3schools.com/php/php_datatypes.asp

		//Variável de texto
		$variavel_de_string = "Valor da variável";
		$variavel_de_string = 'Valor da variável';

		//Variável numérica inteira
		$variavel_numerica_inteira = -23;

		//variavel numérica decimal
		$variavel_numerica_decimal = 123.12;

		//Variável verdadeiro ou falso
		$variavel_boleanas_verdadeira = true;
		$variavel_boleanas_falso = false;


		//Mostrar o valor de variáveis ao utilizador
		$valor01 = "<p>Esta mensagem é mostrada na apresentação de uma variável</p>";
		echo $valor01;


		//Mostrar o valor de um texto conjuntamente com uma variável string (concatenar)
		$valor02 = "Programação de strings";
		echo "<p>O texto da minha variável é: " . $valor02 . "</p>";
		echo "<p>O texto da minha variável é: $valor02</p>";


		//Operações matemáticas
		$soma = 23 + 54;
		echo "<p>Resultado da soma é " . $soma . "</p>";

		$subtracao = 54 - 21;
		echo "<p>Resultado da subtração é " . $subtracao . "</p>";

		$multiplicacao = 23 * 9;
		echo "<p>Resultado da multiplicação é " . $multiplicacao . "</p>";

		$divisao = 23 / 2;
		echo "<p>Resultado da divisão é " . $divisao . "</p>";

		$resto = 24 % 2;
		echo "<p>Resultado do resto da divisão é " . $resto . "</p>";


		$numero01 = 52;
		$numero02 = 14;
		$calculo = $numero01 + $numero02;
		//A variável cálculo vai ter um valor de 66
		echo "<p>O resultado da soma é de " . $calculo . "</p>";

		echo "<p>O resultado da soma feito na função echo é de " . $numero01 + $numero02 . "</p>";

		$calculo = $numero01 * $numero02;
		//A variável cálculo vai ter um valor de 728
		echo "<p>O resultado da soma é de " . $calculo . "</p>";

		$calculo += $numero01;
		//A variável cálculo vai ter um valor de 780
		echo "<p>O resultado da soma é de " . $calculo . "</p>";


		//https://www.w3schools.com/php/php_constants.asp

		//variáveis globais e com valores constantes
			//define(name, value);
				//name -> nome da veriável
				//value -> valor constante dessa variável

		define("VARIAVEL_CONSTANTE", "Valor da variável constante");
		echo VARIAVEL_CONSTANTE;

	?>


</body>
</html>