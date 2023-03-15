<link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
<?php

session_start();
if ( isset($_SESSION['autenticacao'])) {
?>
 
<?php

  //echo "Sim, existe a variável de sessão definida.";
  //session_destroy();

$curl = curl_init();

$filme = $_POST['filme'];
//$filme = "avatar";
$apikey ="69ecc945";


curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://www.omdbapi.com/?t='. $filme.'&apikey='.$apikey,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));


$response = curl_exec($curl);

//Código de resposta de pedido
$status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

//echo "Status code: ". $status_code;

//echo "<br><br>";

//String
//echo $response;

//echo "<br><br>";

//Converter a string para um Objeto
$json = json_decode($response);
//Converter o json para um Array
$array = json_decode(json_encode($json), true);
echo "<h1 class='titulo'>Catálogo de Filmes</h1>";
echo "<div class='conteudo'>";
echo "<p class='texto'><strong>Titulo: </strong>".$json->Title."</p>";
echo "<p class='texto'><strong>Ano: </strong>".$json->Year."</p>";
echo "<p class='texto'><strong>Classificado: </strong>".$json->Rated."</p>";
echo "<p class='texto'><strong>Data: </strong>".$json->Released."</p>";
echo "<p class='texto'><strong>Duração: </strong>".$json->Runtime."</p>";
echo "<p class='texto'><strong>Género: </strong>".$json->Genre."</p>";
echo "<p class='texto'><strong>Direção: </strong>".$json->Director."</p>";
echo "<p class='texto'><strong>Escritor: </strong>".$json->Writer."</p>";
echo "<p class='texto'><strong>Atores: </strong>".$json->Actors."</p>";
echo "<p class='texto'><strong>Trama: </strong>".$json->Plot."</p>";
echo "<p class='texto'><strong>Linguagem: </strong>".$json->Language."</p>";
echo "<p class='texto'><strong>País:</strong>".$json->Country."</p>";
echo "<p class='texto'><strong>Prémios: </strong>".$json->Awards."</p>";
echo "<p class='texto'><strong>Poster: </strong><br>"."<img src='".$json->Poster."'"."/>";
echo "<h3>Avaliações: </h3>";

//foreach ($json->Ratings as $rating) { //Ciclo repetitivo através do objeto
  foreach ($json->Ratings as $rating) {  //Ciclo repetitivo através do array
  //if($rating['Source'] == "Internet move ")
  echo "<p class='texto'><strong>Fonte</strong>: ".$rating->Source."</p>";
  echo "<p class='texto'><strong>Valor</strong>: ".$rating->Value."</p>";

}

echo "<p class='texto'><strong>Fonte: </strong>".$json->Type."</p>";
echo "<p class='texto'><strong>DVD: </strong>".$json->DVD."</p>";
echo "<p class='texto'><strong>Metascore: </strong>".$json->Metascore."</p>";
echo "<p class='texto'><strong>imdbRating: </strong>".$json->imdbRating."</p>";
echo "<p class='texto'><strong>Bilheteria: </strong>".$json->BoxOffice."</p>";
echo "<p class='texto'><strong>Produção: </strong>".$json->Production."</p>";
echo "<p class='texto'><strong>WebSite: </strong>".$json->Website."</p>";
echo "<p class='texto'><strong>Resposta: </strong>".$json->Response."</p>";

if($array['Response']=="False"){
echo "RESPOSTA:" .$array['Response'];
//echo "O filme existe";

echo 0;
}else{
$_SESSION["filme"] = $array;
  //echo "O filme não existe";
 // echo 1;
}

curl_close($curl);

?>

<html>
  <body>
    <form action="index.php" method="post">
    <input type="submit" class="btn btn-lg btn-secondary btn-block btn-center" value="Voltar">
    </form>
  </body>
</html>

<?php
echo "'</div>'";
}else{
 echo "<p class='error'>Não fez a autenticação de forma correta ou está a tentar aceder ao conteúdo de forma indevida.</p>";
 echo "<div class='imagem'><img src='imagens/triste.jpeg'></img></div>";
}
?>