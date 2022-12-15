<?php
    require __DIR__.'/vendor/autoload.php';
    use Kreait\Firebase\Factory;

    $factory = (new Factory())->withDatabaseUri('https://cinema-ccaa4-default-rtdb.firebaseio.com/');

    $database = $factory->createDatabase();


?>