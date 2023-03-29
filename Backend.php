<?php
   require __DIR__ . '/vendor/autoload.php';
   //Connection
   $client = new MongoDB\Client("mongodb://localhost:27017");
   $collection = $client->Examen2023->Examen;
   //$arrayTest = array("iloveyou12345678","iloveyou123456789","iloveyou123456");
   if(isset($_POST['noSegPassword'],$_POST['segPassword'])){
      $password = $_POST['noSegPassword'];
      $segmentedPassword = $_POST['segPassword'];
      
      foreach($segmentedPassword as $seg){
         echo $seg;
      }
   }else{
      echo 'NotNull'; //returnera ett stop tillbaka till javascript ajax.
   }

?>