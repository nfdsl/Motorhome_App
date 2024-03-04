<?php

    //comunicação e abertura do banco
    require __DIR__.'/vendor/autoload.php';
    use Kreait\Firebase\Factory;
    $factory = (new Factory()) -> withDatabaseUri('https://motortrip-f791d-default-rtdb.firebaseio.com/');
    
    $database = $factory -> createDatabase();
?>
