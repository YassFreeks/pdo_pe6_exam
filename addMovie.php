<?php

include_once __DIR__ . '/vendor/autoload.php';

use App\Repository\MovieRepository;

$movieRepository = new MovieRepository();

var_dump($_POST);

if (isset($_POST['title']) && isset($_POST['date'])) {
    $title = $_POST['title'];
    $date = $_POST['releaseDate']; 

    $movieRepository->addMovie([
        'title' => $title,
        'releaseDate' => $date
    ]);
}

header("location: index.php");
exit();