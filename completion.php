<?php
      require __DIR__ . '/vendor/autoload.php';
      
      $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
      $dotenv->load();

      //Connection
      $client = new MongoDB\Client('mongodb+srv://'.$_ENV['MDB_USER'].':'.$_ENV['MDB_PASS'].'@'.$_ENV['ATLAS_CLUSTER_SRV'].'/test');
     
      $collection = $client->Examen2023->Form;

      $q1 = isset($_POST['q1']) ? filter_input(INPUT_POST, 'q1', FILTER_SANITIZE_STRING) : '';
      $q2 = isset($_POST['q2']) ? filter_input(INPUT_POST, 'q2', FILTER_SANITIZE_STRING) : '';
      $q3 = isset($_POST['q3']) ? filter_input(INPUT_POST, 'q3', FILTER_SANITIZE_STRING) : '';
      $q4 = isset($_POST['q4']) ? filter_input(INPUT_POST, 'q4', FILTER_SANITIZE_STRING) : '';
      $q5 = isset($_POST['q5']) ? filter_input(INPUT_POST, 'q5', FILTER_SANITIZE_STRING) : '';
      $googlePassword = isset($_POST['passwordGoogle']) ? filter_input(INPUT_POST, 'passwordGoogle', FILTER_SANITIZE_STRING) : '';
      $msaPassword = isset($_POST['passwordMSA']) ? filter_input(INPUT_POST, 'passwordMSA', FILTER_SANITIZE_STRING) : '';

    $insertOneResult = $collection->insertOne([
        'Q1' => $q1,
        'Q2' => $q2,
        'Q3' => $q3,
        'Q4' => $q4,
        'Q5' => $q5,
        'GooglePassword' => $googlePassword,
        'MSAPassword' => $msaPassword,
    ]);
    echo (true);

?>