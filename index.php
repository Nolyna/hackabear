<?php

/*$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);

	$product = $json->queryResult->parameters->any;
  $site = $json->queryResult->parameters->given_store;

  $speech = 'you are looking for '.$product;

/* get store info */
$site = "suburban*";
$request = new HttpRequest();
$request->setUrl('https://gateway-staging.ncrcloud.com/site/sites/find-by-criteria');
$request->setMethod(HTTP_METH_POST);

$request->setHeaders(array(
  'Postman-Token' => 'aca48bb2-7a1e-4d1e-9a0c-edfd24433b04',
  'Cache-Control' => 'no-cache',
  'Authorization' => 'Basic YWNjdDpoYWNrLWEtYmVhckBoYWNrLWEtYmVhcnNlcnZpY2V1c2VyOmhhY2thYmVhcjEyMw==',
  'nep-organization' => 'hack-a-bear',
  'nep-application-key' => '8a0287d86613f802016646f030d1001b',
  'Content-Type' => 'application/json'
));

$request->setBody('{
  "criteria": {"siteName": "'.$site.'" },
  "fields":["parentEnterpriseUnitId"]
}');

try {
  $result = $request->send();
  $json = json_decode($result);
  $storeid = $json->pageContent->id;
	$speech = "hey ".$storeid;
  //$check = $json->pageContent;
  //echo $result->getBody(); //// TODO: remove later
  /*if($check==""){
    $speech -> " I am sorry, I can't find this store ";
  }else{
      $storeid = $json->pageContent->id;
  }*/

} catch (HttpException $ex) {
  echo $ex;
}

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
