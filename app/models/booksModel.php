<?php
namespace App\Models\BooksModel;
use \PDO;

function findAll (PDO $connexion): array {
$sql = "SELECT *
        FROM books b
        INNER JOIN authors a ON b.author_id = a.id
        ORDER BY b.notation DESC
        LIMIT 3;";
return $connexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
// L'ajout des alias renvoie une erreur (b.id AS bookID, a.id AS authorID)
}       