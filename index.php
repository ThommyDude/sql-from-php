<?php

    require './database.php';

    // Connect to the 'djur' database on this machine
    $djurDB = new Database('djur');

    // Returns all animals
    $results = $djurDB->getAllAnimals();


    // Print, update and print again the name of the first animal.
    $results[0]->sayName();
    $results[0]->updateName($results[0]->namn."!");
    $results[0]->sayName();

?>