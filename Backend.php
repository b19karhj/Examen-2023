<?php
require __DIR__ . '/vendor/autoload.php';
   //Connection
   $client = new MongoDB\Client("mongodb://localhost:27017");
   $collection = $client->Examen2023->Examen;
   //$arrayTest = array("iloveyou12345678","iloveyou123456789","iloveyou123456");
   if(isset($_POST['password'])){
      $password = $_POST['password'];
      $cursor = $collection->findOne(['Password' => 'iloveyou']); // Returns object whith password equals "iloveyou"
   if($cursor == null){
      $testArray = [];
      for ($i = 0; $i < count($arrayTest); $i++){
         $totalHits = 0;
         $filter = ['Password' => ['$regex' => $arrayTest[$i]]]; // Find documents where 'name' field starts with 'J'
         $cursor =  $collection->find($filter);
         $dataArray = $cursor->toArray();

         foreach ($dataArray as $document){ 
            $hits = $document->Hits;  //Saves the number from Hits
            $totalHits += $hits;  //Adds and saves the total value of hits
         }
         $testArray[] = $totalHits;
      };

      foreach($testArray as $result){
         print($result."\n");
      };
   }else{
      echo 'NotNull'; //returnera ett stop tillbaka till javascript ajax.
   }
}
?>