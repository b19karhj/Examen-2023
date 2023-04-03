<?php
      require __DIR__ . '/vendor/autoload.php';
      
      $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
      $dotenv->load();

      //Connection
      $client = new MongoDB\Client('mongodb+srv://'.$_ENV['MDB_USER'].':'.$_ENV['MDB_PASS'].'@'.$_ENV['ATLAS_CLUSTER_SRV'].'/test');
     
      $collection = $client->Examen2023->Form;

      $insertOneResult = $collection->insertOne([
         'username' => 'admin',
         'email' => 'admin@example.com',
         'name' => 'Admin User'
      ]);

?>