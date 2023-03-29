<?php
require __DIR__ . '/vendor/autoload.php';
   //Connection
   
   $client = new MongoDB\Client("mongodb://localhost:27017");
   $collection = $client->Examen2023->Examen;
   
   //if(isset($_POST['password'])){
     // $password = $_POST['password'];
   //};
   //$password = 'iloveyou';
  
   $arrayTest = array("i","love","you");
 

   //$query1 = $collection->find([ 'Password' => [ '$regex' => '%love$' ]]);


//var_dump($cursor);

//$cursor = $collection->find(['Password' => [$regex ], 'rock']);
//var_dump($cursor);
//foreach($client->listDatabases() as $db){ // Listar alla databaser som finns.
  // var_dump($db); 
//};


// Set up query with regex
$filter = ['Password' => ['$regex' => 'iloveyou12345678']]; // Find documents where 'name' field starts with 'J'
//$options = [];

// Execute query

$cursor =  $collection->find($filter);

$dataArray = $cursor->toArray();

//$theHash = $_POST['hashString'];
//print($theHash); 

$totalArray = array();
$totalHits = 0;
foreach ($dataArray as $document){ 
   $hits = $document->Hits;  //Saves the number from Hits
   $totalHits += $hits;  //Adds and saves the total value of hits
   //$totalArray[] = $totalHits;
   
};
//var_dump($totalHits);//[] = $totalHits;
print($totalHits);
   //print($numbers);
//return // skicka tillbaka.
//Todo. query ett password och få hits som response.

   
?>