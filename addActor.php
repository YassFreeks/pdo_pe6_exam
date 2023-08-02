<?php

include_once __DIR__ . '/vendor/autoload.php';

use App\Repository\ActorRepository;

$actorRepository = new ActorRepository();

var_dump($_POST);

if (isset($_POST['first-name']) && isset($_POST['last-name'])) {
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name']; 

    $actorRepository->addActor([
        'first-name' => $firstName,
        'last-name' => $lastName
    ]);
}

header("location: index.php");
exit();