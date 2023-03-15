<?php

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

curl_close($curl);

echo "Status code: ". $status_code;

echo "<br><br>";

//String
echo $response;

echo "<br><br>";

//Converter a string para um Objeto
$json = json_decode($response);

print_r($json);

echo "<br><br>";

echo "Titulo através de um objeto: ". $json->Title;

echo "<br><br>";

//Converter o json para um Array
$array = json_decode(json_encode($json), true);

print_r($array);

echo "<br><br>";

echo "Através de array:". $array['Title'];

echo "<img src='" . $array['Poster'] . "'>";

echo "<br><br><br><br><br>";

if($array['Response']=="True"){
echo "RESPOSTA:" .$array['Response'];
session_start();
$_SESSION["filme"] = $array;
echo "O filme existe";
}else{
  echo "O filme não existe";
}

echo "<br><br><br><br><br>";
?>
