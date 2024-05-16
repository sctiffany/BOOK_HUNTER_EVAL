<?php
namespace App\Models\BooksModel;
use \PDO;

function findAll (PDO $connexion): array {
$sql = "SELECT *, b.id AS bookID, a.id AS authorID
        FROM books b
        INNER JOIN authors a ON b.author_id = a.id
        LEFT JOIN users_notations un ON b.id = un.book_id
        INNER JOIN categories c ON b.category_id = c.id
        ORDER BY un.note DESC
        LIMIT 3;";
return $connexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
// L'ajout des alias renvoie une erreur (b.id AS bookID, a.id AS authorID)
// LEFT JOIN books_has_tags bht ON b.id = bht.book_id
// INNER JOIN tags t ON t.id = bht.tag_id
}       