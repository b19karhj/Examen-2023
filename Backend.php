<?php
      require __DIR__ . '/vendor/autoload.php';
      
      $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
      $dotenv->load();

      //Connection
      $client = new MongoDB\Client('mongodb+srv://'.$_ENV['MDB_USER'].':'.$_ENV['MDB_PASS'].'@'.$_ENV['ATLAS_CLUSTER_SRV'].'/test');
     
      $collection = $client->Examen2023->Examen;
      
      if(isset($_POST['notSegmentedPassword']) && isset($_POST['segmentedPassword'])){
         $password = JSON_decode($_POST['notSegmentedPassword']);
         $segmentedPassword = JSON_decode($_POST['segmentedPassword'], true);
         $cursor = $collection->findOne(['Password' => $password]); // Returns single object if found
         
         if($cursor == null){
            $responseArray = [];
            for ($i = 0; $i < count($segmentedPassword); $i++){
               error_log(memory_get_usage()); 
               $totalHits = 0;
               if($segmentedPassword[$i] == " "){
                  $totalHits = 0;
               }
               else{
                  $filter = ['Password' => ['$regex' => $segmentedPassword[$i]]]; // Find documents with regex include
              
                  $cursor =  $collection->find($filter);
                  $dataArray = $cursor->toArray();
                  
                  foreach ($dataArray as $document){ 
                     $hits = $document->Hits;  //Saves the number from Hits
                     $totalHits += $hits;  //Adds and saves the total value of hits
                  }
               }
               
               $responseArray[] = $totalHits; // Saves the total hits in array
            };
            
            echo JSON_encode($responseArray);
            
         }else if ($cursor != null){
            echo JSON_encode(true); //returnera ett stop tillbaka till javascript ajax.
         }
   }
   
?>