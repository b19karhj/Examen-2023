<?php
   require_once __DIR__ . '/vendor/autoload.php';

   
   // connect to mongodb
   $client = new MongoDB\Client("mongodb://localhost:27017");
	$database = $client->database;
   $password = $database->password;

   $db = $password->find(
      ['Password:' => '123456']
   );
   var_dump($db);
   
   /*foreach($client->listDatabases() as $db){ // Listar alla databaser som finns.
      var_dump($db); 
   };*/

  /* foreach($database->listCollections() as $collection){
      var_dump($collection);
   }*/
   
   //Todo. query ett password och få hits som response.

 

      
?>