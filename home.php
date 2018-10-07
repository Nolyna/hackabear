<?php

echo '<h1> Hello <h1> ' 
$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$product = $json->queryResult->parameters->given-product;
  $site = $json->queryResult->parameters->given-store;

  $speech = 'you are looking for '.$product;

	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "webhook";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>
