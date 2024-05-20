<?php
namespace App\Models\BooksModel;
use \PDO;

function findAll (PDO $connexion, int $limit = 6): array {
        $sql = "SELECT *, b.id AS bookID, a.id AS authorID
                FROM books b
                INNER JOIN authors a ON b.author_id = a.id
                LEFT JOIN users_notations un ON b.id = un.book_id
                INNER JOIN categories c ON b.category_id = c.id
                ORDER BY un.note DESC
                LIMIT :limit;";
        $rs = $connexion->prepare($sql);
        $rs->bindValue(':limit', $limit, PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetchAll(PDO::FETCH_ASSOC);

}  

function findOneById (PDO $connexion, int $id): array {
        $sql = "SELECT *, b.id AS bookID, a.id AS authorID, c.id AS categoryID, c.name AS categoryName, t.id AS tagID, t.name AS tagName
        FROM books b
        INNER JOIN authors a ON b.author_id = a.id
        INNER JOIN categories c ON b.category_id = c.id
        LEFT JOIN books_has_tags bht ON b.id = bht.book_id
        INNER JOIN tags t ON t.id = bht.tag_id
        WHERE b.id = :id;";

        $rs = $connexion->prepare($sql);  // RecordsSet
        $rs->bindValue(':id', $id, \PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetch(\PDO::FETCH_ASSOC);
}

function findAllByAuthorId (PDO $connexion, int $id): array {
        $sql = "SELECT *, b.id AS bookID, a.id AS authorID
                FROM books b
                INNER JOIN authors a ON b.author_id = a.id
                LEFT JOIN users_notations un ON b.id = un.book_id
                INNER JOIN categories c ON b.category_id = c.id
                WHERE b.author_id = :id
                ORDER BY un.note DESC;";
        $rs = $connexion->prepare($sql);
        $rs->bindValue(':id', $id, PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetchAll(PDO::FETCH_ASSOC);

}