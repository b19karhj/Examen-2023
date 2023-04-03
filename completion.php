<?php
      require __DIR__ . '/vendor/autoload.php';
      
      $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
      $dotenv->load();

      //Connection
      $client = new MongoDB\Client('mongodb+srv://'.$_ENV['MDB_USER'].':'.$_ENV['MDB_PASS'].'@'.$_ENV['ATLAS_CLUSTER_SRV'].'/test');
     
      $collection = $client->Examen2023->Form;

      if(isset($_POST['qe1'])){
        $p1 = json_decode($_POST['qe1']);
        $insertOneResult = $collection->insertOne([
            'username' => 'admin2',
            'email' => 'admin@example.com2',
            'name' => 'Admin User2',
        ]);
         echo json_encode($p1);
      };
      

?>