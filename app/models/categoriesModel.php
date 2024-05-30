<?php 
namespace App\Models\CategoriesModel;
use \PDO;

function findAll (PDO $connexion): array {
    $sql = "SELECT *
            FROM categories
            ORDER BY name ASC;";
    return $connexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function findOneById (PDO $connexion, int $id): array {
    $sql = "SELECT *
            FROM categories
            WHERE id = :id;";
        $rs = $connexion->prepare($sql);  // RecordsSet
        $rs->bindValue(':id', $id, PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetch(PDO::FETCH_ASSOC);
}
