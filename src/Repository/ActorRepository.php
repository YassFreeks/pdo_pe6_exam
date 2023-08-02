<?php

namespace App\Repository;

use App\Models\Actor;
use App\Service\PDOService;

class ActorRepository
{

    private PDOService $pdoService;

    public function __construct()
    {
        $this->pdoService = new PDOService();
    }

    public function findAll()
    {
        // SELECT * from album
        $query = $this->pdoService->getPdo()->query("SELECT * from actor");
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addActor(array $array)
    {
        $query = $this->pdoService->getPdo()->prepare(
            "INSERT INTO actor(first_name, last_name) VALUES (:truc, :machin)" );
        
        $query->bindParam(':truc', $array['first-name']);
        $query->bindParam(':machin', $array['last-name']);

        $query->execute();
    }




    // //Actor si en objet
    // public function insertActor(Actor|array $actor): Actor|array
    // {

    // }
}