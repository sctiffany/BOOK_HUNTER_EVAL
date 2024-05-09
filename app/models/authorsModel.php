<?php
namespace App\Models\AuthorsModel;
use \PDO;

function findAll (PDO $connexion): array {
$sql = "SELECT authors.id, authors.lastname, authors.firstname, authors.picture, authors.created_at, AVG(books.notation) AS moyenne_notation
        FROM authors
        INNER JOIN books ON books.author_id = authors.id
        GROUP BY authors.id
        ORDER BY moyenne_notation DESC
        LIMIT 3;";
return $connexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}