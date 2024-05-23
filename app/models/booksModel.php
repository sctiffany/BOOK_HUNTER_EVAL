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
        $sql = "SELECT *, c.name AS categoryName
        FROM books b
        INNER JOIN authors a ON b.author_id = a.id
        INNER JOIN categories c ON b.category_id = c.id
        LEFT JOIN users_notations un ON un.book_id = b.id 
        INNER JOIN users u ON un.user_id = u.id 
        WHERE b.id = :id;";

        $rs = $connexion->prepare($sql);  // RecordsSet
        $rs->bindValue(':id', $id, PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetch(PDO::FETCH_ASSOC);
}

function findAllByAuthorId (PDO $connexion, int $id): array {
        $sql = "SELECT *
                FROM books b
                INNER JOIN authors a ON a.id = b.author_id
                WHERE a.id = :id";
        $rs = $connexion->prepare($sql);
        $rs->bindValue(':id', $id, PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetchAll(PDO::FETCH_ASSOC);

}

/*SELECT *, b.id AS bookID, a.id AS authorID
                FROM books b
                INNER JOIN authors a ON b.author_id = a.id
                LEFT JOIN users_notations un ON b.id = un.book_id
                INNER JOIN categories c ON b.category_id = c.id
                WHERE b.author_id = :id
                ORDER BY un.note DESC; */