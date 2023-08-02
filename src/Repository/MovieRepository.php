<?php

namespace App\Repository;

use App\Service\PDOService;
use App\Models\Movie;

class MovieRepository
{

    private PDOService $pdoService;

    public function __construct()
    {
        $this->pdoService = new PDOService();
    }

    public function findAll()
    {
        // SELECT * from album
        $query = $this->pdoService->getPdo()->query("SELECT * from movie");
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addMovie(array $array)
    {
        $query = $this->pdoService->getPdo()->prepare(
            "INSERT INTO movie(title, release_date) VALUES (:title, :releaseDate)" );
        
        $query->bindParam(':title', $array['title']);
        $query->bindParam(':releaseDate', $array['releaseDate']);

        $query->execute();
    }


    //array de Movie si en objet
    public function findByTitle(string $title): array
{
    $query = $this->pdoService->getPdo()->prepare("SELECT * FROM movie WHERE title LIKE :title");
    $query->bindValue(':title', "%$title%");
    $query->execute();

    return $query->fetchAll(\PDO::FETCH_ASSOC);
}


}