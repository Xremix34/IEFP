<?php
  
  // RECEBER OS DADOS PELO MÉTODO POST DO AJAX
  // OS CAMPOS key's E OS VALORES SÃO ATRIBUIDAS AO ARRAY
  $dados = $_POST;

  $campo01 = $dados['campo01'];

  $campo02 = $dados['campo02'];

  $selecao = $dados['caixa_selecao'];

  $tempo = time();

// CRIA UM FICHEIRO
$ficheiro = fopen("ficheiros/#".$tempo."-nome_do_ficheiro.txt", "w");
// Modo 'w' cria ou abre e regrava o conteúdo do ficheiro
// Modo 'a' acrescenta conteúdo ao ficheiro

//ESCREVE NO FICHEIRO 
fwrite($ficheiro, "Texto escrito manual ou de uma string como campo 01 que é ".$campo01);

//GUARDAR E FECHAR O FICHEIRO
fclose($ficheiro);


?>