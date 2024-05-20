<?php
namespace App\Models\AuthorsModel;
use \PDO;

function findAll (PDO $connexion, $limit = 6): array {
$sql = "SELECT a.id, a.lastname, a.firstname, a.picture, a.created_at, a.biography, AVG(un.note) AS moyenne_notation
        FROM authors a
        INNER JOIN books b ON b.author_id = a.id
        LEFT JOIN users_notations un ON b.id = un.book_id
        GROUP BY a.id
        ORDER BY moyenne_notation DESC
        LIMIT :limit;";
$rs = $connexion->prepare($sql);
$rs->bindValue(':limit', $limit, PDO::PARAM_INT);
$rs->execute();
return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findOneById (PDO $connexion, int $id): array {
        $sql = "SELECT *
                FROM authors
                WHERE id = :id;";
        $rs = $connexion->prepare($sql);  // RecordsSet
        $rs->bindValue(':id', $id, \PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetch(\PDO::FETCH_ASSOC);
}