<?php
      require __DIR__ . '/vendor/autoload.php';
      //Connection
      $client = new MongoDB\Client("mongodb+srv://Rena:ZynMonster%40!23@examen2023.rho8i7v.mongodb.net/test");
      $collection = $client->Examen2023->Examen;
      
      if(isset($_POST['segPassword']) && isset($_POST['noSegPassword'])){
         $password = json_decode($_POST['noSegPassword']);
         $segmentedPassword = json_decode($_POST['segPassword'], true);
         $cursor = $collection->findOne(['Password' => $password]); // Returns single object if found
         
         if($cursor == null){
            $responseArray = [];
            for ($i = 0; $i < count($segmentedPassword); $i++){
               $totalHits = 0;
               $filter = ['Password' => ['$regex' => $segmentedPassword[$i]]]; // Find documents with regex include
               $cursor =  $collection->find($filter);
               $dataArray = $cursor->toArray();
   
               foreach ($dataArray as $document){ 
                  $hits = $document->Hits;  //Saves the number from Hits
                  $totalHits += $hits;  //Adds and saves the total value of hits
               }
   
               $responseArray[] = $totalHits; // Saves the total hits in array
            };
            echo json_encode($responseArray);
            
         }else if ($cursor != null){
            echo json_encode(true); //returnera ett stop tillbaka till javascript ajax.
         }
   }
?>