<?php
      require __DIR__ . '/vendor/autoload.php';
      
      $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
      $dotenv->load();

      //Connection
      $client = new MongoDB\Client('mongodb+srv://'.$_ENV['MDB_USER'].':'.$_ENV['MDB_PASS'].'@'.$_ENV['ATLAS_CLUSTER_SRV'].'/test');
      $collection = $client->Examen2023->Examen;
      
      if(isset($_POST['notSegmentedPassword'])){
      $password = filter_var(JSON_decode($_POST['notSegmentedPassword']), FILTER_SANITIZE_STRING); //santaize from injection
  
      $noSegments = ['Password' => $password]; //Prepared segments to protect against injections
      $cursor= $collection->findOne($noSegments); 
    
      $responseArray = [];
      if($cursor == null){
         $segmentedPassword = JSON_decode($_POST['segmentedPassword'], true);
         for($i = 0; $i < count($segmentedPassword); $i++){ //For loop to santitize from
            $segmentedPassword[$i] = filter_var($segmentedPassword[$i], FILTER_SANITIZE_STRING); //santaize from injection
         }

         for ($i = 0; $i < count($segmentedPassword); $i++){
           // error_log(memory_get_usage()); 
            $totalHits = 0;
            $iValue = preg_quote($segmentedPassword[$i]);
            if($iValue == " "){
               $totalHits = 0;
            }
            else{
               //Prepare statements for segments
               $filter = ['Password' => ['$regex' => $iValue]];// Find documents with regex include
               $query = $collection->find($filter); // Find documents with regex include 
               
               $dataArray = $query->toArray();
               
               foreach ($dataArray as $document){ 
                  $hits = $document->Hits;  //Saves the number from Hits
                  $totalHits += $hits;  //Adds and saves the total value of hits
               }
              
            } 
            $responseArray[] = $totalHits; // Saves the total hits in array     
         }; 
      echo JSON_encode($responseArray);  
   }
   else if ($cursor != null){
      echo JSON_encode(true); //returnera ett stop tillbaka till javascript ajax.
   }
}
?>