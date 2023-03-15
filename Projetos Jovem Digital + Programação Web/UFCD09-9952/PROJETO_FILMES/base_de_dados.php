<?php
  //echo "Sim, existe a variável de sessão definida.";
  //session_destroy();


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

function consultar_autenticacao($conn, $utilizador, $password){
  $pass = md5($password);
  $sql = "SELECT * FROM `registo` WHERE `utilizador` LIKE '$utilizador' AND `password` LIKE '$pass';";

  $result = mysqli_query($conn, $sql);

  $row = mysqli_num_rows($result);
  
  if($row){

    //Iniciar variáveis de sessão
    session_start();
    $row = mysqli_fetch_array($result);
    //Criar e a atribuir um valor a uma variável de sessão
    //Para criar/ler uma variável de sessão é obrigatório iniciar as variáveis de sessão
    $_SESSION['autenticacao'] = 1;
    $_SESSION['user_id'] = $row['id'];


    //echo "Credenciais de autenticação válidas.";
    echo 1;
  }else{
   // echo "Credenciais de autenticação inválidas.";
  echo 0;
  }
}

//fUNÇÃO PARA FECHAR A LIGAÇÃO À BD
function fechar_bd($conn) {
  mysqli_close($conn);

}

?>