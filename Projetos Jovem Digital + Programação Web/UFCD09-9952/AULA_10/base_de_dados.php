<?php
// Ficheiro responsável para fazer ligação, etc à base de dados

//Ligar ao servidor
function conectar_bd(){
//Endereço ao servidor mySQL
$servername = "localhost"; //localhost (domínio) ou 127.0.0.1 (ip local)

//utilizador da base de dados
$username = "root";

//Password de acesso à base de dados
$password = "";

//Identificação da base de dados
$database = "pw22va63_eb";

$conn = new mysqli($servername, $username, $password, $database);

//Validar a ligação bd
if($conn -> connect_error){
  die("A conecção à BD Falhou! ".$conn->connect_error);
}else{
  //echo "A ligação foi bem sucedida.";
}
//Retorna o valor da ligação à bd

return $conn;
}

//FUNÇÃO PARA INSERIR REGISTROS NA BD
function inserir_registro($conn, $utilizador, $email, $password, $genero, $distrito, $tempo){ // no caso de seleção de mais de um campo deve atribuir-se um valor booleano falso (ex: $genero = false)
 // verificar_email($conn, $email);
 $sql = "SELECT * FROM `registo` WHERE `email` LIKE '$email';";

 $result = mysqli_query($conn, $sql);

 $row = mysqli_num_rows($result);
 
 if($row){
  echo 1;
 } else{
    echo 0;
  $sql = "INSERT INTO `registo` (`utilizador`, `email`, `password`, `genero`, `distritos`, `tempo`) VALUES ('$utilizador', '$email', '$password', '$genero', '$distrito', '$tempo');";
  //echo $sql; // para depuração da query da base de dados
  $result = mysqli_query($conn, $sql);
  
  echo "O número de registo (id) deste formulário é: ".$conn->insert_id; // Mostra o id do formulário correspondente na base de dados 
  }
}

function consultar_autenticacao($conn, $utilizador, $password){

  $sql = "SELECT * FROM `registo` WHERE `utilizador` LIKE '$utilizador' AND `password` LIKE '$password';";

  $result = mysqli_query($conn, $sql);

  $row = mysqli_num_rows($result);
  
  if($row){

    //Iniciar variáveis de sessão
    session_start();

    //Criar e a atribuir um valor a uma variável de sessão
    //Para criar/ler uma variável de sessão é obrigatório iniciar as variáveis de sessão
    $_SESSION['autenticacao'] = 1;

    //echo "Credenciais de autenticação válidas.";
    echo 1;
  }else{
   // echo "Credenciais de autenticação inválidas.";
  echo 0;
  }
}

//Consultar todos os dados da tabela distritos
function distritos($conn){
  $sql = "SELECT * FROM `distritos`;";
  $result = mysqli_query($conn, $sql);

  //Retornar o resultado da consulta
  return $result;
}


//Consulta de dados de um utilizador retornando várias linhas (foreach)
function consulta_de_dados($conn, $id){
  $sql = "SELECT * FROM `registo` WHERE `id`='$id'";
  $result = mysqli_query($conn, $sql);

  //Retornar o resultado da consulta
  return $result;
}

//Consulta de dados de um utilizador retornando apenas uma linha de código 
function consulta_de_dados_c_registo_unico($conn, $id){
  $sql = "SELECT * FROM `registo` WHERE `id`='$id'";
  $result = mysqli_query($conn, $sql);

  $row = mysqli_fetch_array($result);
  //Retornar o resultado da consulta
  return $row;
}

/*function verificar_email($conn, $email){
  $sql = "SELECT * FROM `registo` WHERE `email` LIKE '$email';";

  $result = mysqli_query($conn, $sql);

  $row = mysqli_num_rows($result);
  
  if($row){
    //Iniciar variáveis de sessão
    echo 1;

  }else{
   echo 0;
  }*/


/*  $sql = "SELECT * FROM `registo` WHERE `email` = '$email'";
  $query = $mysqli->query( $sql );
  if( $query->num_rows > 0 ) {//se retornar algum resultado
    echo 'O email já existe na base de dados';
  } else {
    inserir_registro($conn, $utilizador, $email, $password, $genero, $distrito, $tempo);
  }
}*/


/*function atualizar_dados(){

}*/


//fUNÇÃO PARA FECHAR A LIGAÇÃO À BD
function fechar_bd($conn) {
  mysqli_close($conn);

}

?>