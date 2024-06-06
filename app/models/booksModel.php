<?php
namespace App\Models\BooksModel;
use \PDO;

function findAll (PDO $connexion, int $limit = 6): array {
        $sql = "SELECT b.*, a.*, c.name, b.id AS bookID, a.id AS authorID, AVG(un.note) AS moyenne_notation
                FROM books b
                INNER JOIN authors a ON b.author_id = a.id
                LEFT JOIN users_notations un ON b.id = un.book_id
                INNER JOIN categories c ON b.category_id = c.id
                GROUP BY b.id
                ORDER BY moyenne_notation DESC
                LIMIT :limit;";
        $rs = $connexion->prepare($sql);
        $rs->bindValue(':limit', $limit, PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetchAll(PDO::FETCH_ASSOC);

}  

function findOneById (PDO $connexion, int $id): array {
        $sql = "SELECT *, b.id AS bookID, c.name AS categoryName, a.id AS authorID
        FROM books b
        INNER JOIN authors a ON b.author_id = a.id
        INNER JOIN categories c ON b.category_id = c.id
        LEFT JOIN users_notations un ON un.book_id = b.id 
        LEFT JOIN users u ON un.user_id = u.id 
        WHERE b.id = :id;";

        $rs = $connexion->prepare($sql);  // RecordsSet
        $rs->bindValue(':id', $id, PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetch(PDO::FETCH_ASSOC);
}

function findAllByAuthorId (PDO $connexion, int $id): array {
        $sql = "SELECT *, b.id AS bookID
                FROM books b
                INNER JOIN authors a ON a.id = b.author_id
                WHERE a.id = :id";
        $rs = $connexion->prepare($sql);
        $rs->bindValue(':id', $id, PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetchAll(PDO::FETCH_ASSOC);

}

function findAllByCategoryId (PDO $connexion, int $id): array {
        $sql = "SELECT b.*, a.*, c.name, b.id AS bookID, a.id AS authorID, AVG(un.note) AS moyenne_notation
                FROM books b
                INNER JOIN authors a ON b.author_id = a.id
                LEFT JOIN users_notations un ON b.id = un.book_id
                INNER JOIN categories c ON b.category_id = c.id
                WHERE c.id = :id
                GROUP BY b.id
                ORDER BY moyenne_notation DESC;";

        $rs = $connexion->prepare($sql);
        $rs->bindValue(':id', $id, PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findAllByTagId (PDO $connexion, int $id): array {
        $sql = "SELECT b.*, a.*, t.*, b.id AS bookID, AVG(un.note) AS moyenne_notation
                FROM books b
                LEFT JOIN books_has_tags bht ON b.id = bht.book_id
                INNER JOIN tags t ON bht.tag_id = t.id
                INNER JOIN authors a ON b.author_id = a.id
                LEFT JOIN users_notations un ON b.id = un.book_id
                WHERE bht.tag_id = :id
                GROUP BY b.id
                ORDER BY moyenne_notation DESC;";

        $rs = $connexion->prepare($sql);
        $rs->bindValue(':id', $id, PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetchAll(PDO::FETCH_ASSOC);
}