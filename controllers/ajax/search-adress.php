<?php  

$query = $_GET['query'];

use App\Adress\getAdress;
$adress = new getAdress();

$adress_result = $adress->searchAdress($query);

echo json_encode($adress_result);