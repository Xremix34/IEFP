<?php

	//RECEBER OS DADOS PELO MÉTODO POST DO AJAX
	//OS CAMPOS key's E OS VALORES SÃO ATRIBUIDAS AO ARRAY
	$dados = $_POST;

	$campo01 = $dados['campo01'];

	$campo02 = $dados['campo02'];

	$selecao = $dados['caixa_selecao'];

	$tempo = time();

	//CRIA UM FICHEIRO
	$ficheiro = fopen("ficheiros/" . $tempo . "-nome_do_ficheiro.txt", "w");
	//Modo 'w' cria ou abre e re-grava o conteúdo do ficheiro
	//Modo 'a' acrescenta conteúdo ao ficheiro

	//ESCREVER NO FICHEIRO
	fwrite($ficheiro, "Texto escrito manual ou de um string como o campo01 que é " . $campo01);

	//GUARDAR E FECHAR O FICHEIRO
	fclose($ficheiro);

	//UTILIZAR UM FICHEIRO  DE SCRIPT EXTERNO
	include("base_de_dados.php");
	
	//CHAMAR A FUNÇÃO  PARA -> LIGAR À BD
	conectar_bd();

	//CHAMAR A FUNÇÃO PARA -> INSERIR REGISTRO NA BASE DE DADOS
	inserir_registro();

?>