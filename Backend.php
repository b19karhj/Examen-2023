<?php
require __DIR__ . '/vendor/autoload.php';
   //Connection
   
   $client = new MongoDB\Client("mongodb://localhost:27017");
   $collection = $client->Examen2023->Examen;
   
   //if(isset($_POST['password'])){
     // $password = $_POST['password'];
   //};
   //$password = 'iloveyou';
  
   $arrayTest = array("iloveyou12345678","iloveyou123456789","iloveyou123456");
 

   //$query1 = $collection->find([ 'Password' => [ '$regex' => '%love$' ]]);


//var_dump($cursor);

//$cursor = $collection->find(['Password' => [$regex ], 'rock']);
//var_dump($cursor);
//foreach($client->listDatabases() as $db){ // Listar alla databaser som finns.
  // var_dump($db); 
//};


// Set up query with regex

$testArray = [];

for ($i = 0; $i < count($arrayTest); $i++){
   
   $filter = ['Password' => ['$regex' => $arrayTest[$i]]]; // Find documents where 'name' field starts with 'J'
   $cursor =  $collection->find($filter);
   $dataArray = $cursor->toArray();
   $totalHits = 0;
   print($arrayTest[$i]."\n");
      foreach ($dataArray as $document){ 
         $hits = $document->Hits;  //Saves the number from Hits
         //print($hits."\n");
         $totalHits += $hits;  //Adds and saves the total value of hits
         //$totalArray[] = $totalHits;
      }
      $testArray[] = $totalHits;
};


//var_dump($totalHits);//[] = $totalHits;
//print($totalHits);
   //print($numbers);
//return // skicka tillbaka.
//Todo. query ett password och få hits som response.

foreach($testArray as $result){
   print($result."\n");
};
?>