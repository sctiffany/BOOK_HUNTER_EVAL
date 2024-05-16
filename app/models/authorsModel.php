<?php
namespace App\Models\AuthorsModel;
use \PDO;

function findAll (PDO $connexion): array {
$sql = "SELECT a.id, a.lastname, a.firstname, a.picture, a.created_at, a.biography, AVG(un.note) AS moyenne_notation
        FROM authors a
        INNER JOIN books b ON b.author_id = a.id
        LEFT JOIN users_notations un ON b.id = un.book_id
        GROUP BY a.id
        ORDER BY moyenne_notation DESC
        LIMIT 3;";
return $connexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}