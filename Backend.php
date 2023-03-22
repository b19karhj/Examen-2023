<?php
   require_once __DIR__ . '/vendor/autoload.php';

   
   // connect to mongodb
   $client = new MongoDB\Client("mongodb://localhost:27017");
	//$database = $client->database;
   $collection = $client->Examen2023->Examen;
  


   //$cursor = $collection->findOne(['Password' => 'iloveyou']); // Returns object whith password equals "iloveyou"
   $cursor = $collection->find(['Password' => 'rock']);
   var_dump($cursor);
   /*foreach($client->listDatabases() as $db){ // Listar alla databaser som finns.
      var_dump($db); 
   };*/

  /* foreach($database->listCollections() as $collection){
      var_dump($collection);
   }*/
   
   //Todo. query ett password och få hits som response.

 

      
?>