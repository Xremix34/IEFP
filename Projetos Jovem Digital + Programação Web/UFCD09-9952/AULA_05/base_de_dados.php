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
function inserir_registro($conn, $utilizador, $email, $password, $genero, $tempo){ // no caso de seleção de mais de um campo deve atribuir-se um valor booleano falso (ex: $genero = false)
  $sql = "INSERT INTO `registo` (`utilizador`, `email`, `password`, `genero`, `tempo`) VALUES ('$utilizador', '$email', '$password', '$genero', '$tempo');";
  //echo $sql; // para depuração da query da base de dados
  $result = mysqli_query($conn, $sql);
  
  echo "O número de registo (id) deste formulário é: ".$conn->insert_id; // Mostra o id do formulário correspondente na base de dados 

  //Utilizado para depurar erros sql e outros
  //$ficheiro = fopen("sql.txt", "w");
  //fwrite($ficheiro, $sql);
  //fclose($ficheiro);
}

//fUNÇÃO PARA FECHAR A LIGAÇÃO À BD
function fechar_bd($conn) {
  mysqli_close($conn);

}

?>