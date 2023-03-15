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

echo "Status code: ". $status_code;

echo "<br><br>";

//String
echo $response;

echo "<br><br>";

//Converter a string para um Objeto
$json = json_decode($response);
//Converter o json para um Array
$array = json_decode(json_encode($json), true);
echo "<h1>Catálogo de Filmes</h1>";
echo "<strong>Titulo: </strong>".$json->Title;
echo "<br>";
echo "<strong>Ano: </strong>".$json->Year;
echo "<br>";
echo "<strong>Classificado: </strong>".$json->Rated;
echo "<br>";
echo "<strong>Data: </strong>".$json->Released;
echo "<br>";
echo "<strong>Duração: </strong>".$json->Runtime;
echo "<br>";
echo "<strong>Género: </strong>".$json->Genre;
echo "<br>";
echo "<strong>Direção: </strong>".$json->Director;
echo "<br>";
echo "<strong>Escritor: </strong>".$json->Writer;
echo "<br>";
echo "<strong>Atores: </strong>".$json->Actors;
echo "<br>";
echo "<strong>Trama: </strong>".$json->Plot;
echo "<br>";
echo "<strong>Linguagem: </strong>".$json->Language;
echo "<br>";
echo "<strong>País:</strong>".$json->Country;
echo "<br>";
echo "<strong>Prémios: </strong>".$json->Awards;
echo "<br>";
echo "<strong>Poster: </strong><br>"."<img src='".$json->Poster."'"."/>";
echo "<br>";

//print_r($json->Ratings);
//print_r($array['Ratings']);

echo "<h3>Avaliações: </h3>";

//foreach ($json->Ratings as $rating) { //Ciclo repetitivo através do objeto
  foreach ($json->Ratings as $rating) {  //Ciclo repetitivo através do array
  //if($rating['Source'] == "Internet move ")
  echo "<p><strong>Fonte</strong>: ".$rating->Source."</p>";
  echo "<p><strong>Valor</strong>: ".$rating->Value."</p>";

}

echo "<strong>Fonte: </strong>".$json->Type;
echo "<br>";
echo "<strong>DVD: </strong>".$json->DVD;
echo "<br>";
echo "<strong>Metascore: </strong>".$json->Metascore;
echo "<br>";
echo "<strong>imdbRating: </strong>".$json->imdbRating;
echo "<br>";
echo "<strong>Bilheteria: </strong>".$json->BoxOffice;
echo "<br>";
echo "<strong>Produção: </strong>".$json->Production;
echo "<br>";
echo "<strong>WebSite: </strong>".$json->Website;
echo "<br>";
echo "<strong>Resposta: </strong>".$json->Response;
echo "<br><br>";

if($array['Response']=="False"){
echo "RESPOSTA:" .$array['Response'];
//echo "O filme existe";

echo 0;
}else{
  session_start();
$_SESSION["filme"] = $array;
  //echo "O filme não existe";
  echo 1;
}

curl_close($curl);

?>

<html>
  <body>
    <form action="pesquisar_filmes.php" method="post">
    <input type="submit" value="Voltar">
    </form>
  </body>
</html>

<?php
}else{
  echo "Não fez a autenticação de forma correta ou está a tentar aceder ao conteúdo de forma indevida.";
}
?>