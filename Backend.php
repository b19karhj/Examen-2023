<?php
use MongoDB\Tests\SpecTests\ResultExpectation;
   require __DIR__ . '/vendor/autoload.php';
   
   // connect to mongodb
   $client = new MongoDB\Client("mongodb://localhost:27017");
	//$database = $client->database;
   //$collection = $database->collection;
   $collection = $client->Examen2023->Examen;
  
   
   //$query1 = $collection->find([ 'Password' => [ '$regex' => '%love$' ]]);

   //$cursor = $collection->findOne(['Password' => "iloveyou"]); // Returns object whith password equals "iloveyou"

   //var_dump($query1);

   //$cursor = $collection->find(['Password' => [$regex ], 'rock']);
  // var_dump($cursor);
   /*foreach($client->listDatabases() as $db){ // Listar alla databaser som finns.
      var_dump($db); 
   };*/
// Set up query with regex
   $filter = ['Password' => ['$regex' => 'love']]; // Find documents where 'name' field starts with 'J'
   $options = [];

   // Execute query
 
   $cursor =  $collection->find($filter);
   
   $dataArray = $cursor->toArray();
   $theHash = $_POST['hashString'];
   print($theHash); 

  /*foreach ($dataArray as $document){ 
      //$hits = $document->Hits; $password = $document->Password; 
      print($hits ."\n"); 
   }
   return // skicka tillbaka.
   //Todo. query ett password och få hits som response.*/

 

      
?>