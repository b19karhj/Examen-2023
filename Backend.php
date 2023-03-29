<?php
   require __DIR__ . '/vendor/autoload.php'; //BEHOVER TAS BORT FOR RIKTIGA SERVERN
   //Connection
   $client = new MongoDB\Client("mongodb://localhost:27017");
   $collection = $client->Examen2023->Examen;
   //$arrayTest = array("iloveyou12345678","iloveyou123456789","iloveyou123456"); //Test array
   if(isset($_POST['noSegPassword'],$_POST['segPassword'])){
      $password = $_POST['noSegPassword'];
      $segmentedPassword = $_POST['segPassword']->toArray();
      $cursor = $collection->findOne(['Password' => $password]); // Returns single object if found

      if($cursor == null){
         $responseArray = [];
         for ($i = 0; $i < count($responseArray); $i++){
            $totalHits = 0;
            $filter = ['Password' => ['$regex' => $responseArray[$i]]]; // Find documents with regex include
            $cursor =  $collection->find($filter);
            $dataArray = $cursor->toArray();

            foreach ($dataArray as $document){ 
               $hits = $document->Hits;  //Saves the number from Hits
               $totalHits += $hits;  //Adds and saves the total value of hits
            }

            $responseArray[] = $totalHits; // Saves the total hits in array
         };

         foreach($responseArray as $result){ //Test print for Array
            print($result."\n");
         };
         
      }
}else{
   echo 'NotNull'; //returnera ett stop tillbaka till javascript ajax.
}
?>