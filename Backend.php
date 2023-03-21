<?php
   require_once __DIR__ . '/vendor/autoload.php';

   
   // connect to mongodb
   $client = new MongoDB\Client("mongodb://localhost:27017");
	
   
   foreach($client->listDatabases() as $db){ // Listar alla databaser som finns.
      var_dump($db); 
   };

  /* foreach($database->listCollections() as $collection){
      var_dump($collection);
   }*/
   
      
?>