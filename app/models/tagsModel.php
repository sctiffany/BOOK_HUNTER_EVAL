<?php
namespace App\Models\TagsModel;
use \PDO;

function findAll (PDO $connexion): array {
        $sql = "SELECT *
                FROM tags
                ORDER BY name ASC;";
        return $connexion->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

function findAllByBookId (PDO $connexion, int $id): array {
        $sql = "SELECT *, t.id AS tagID, t.name AS tagName, b.id AS bookID
                FROM tags t
                LEFT JOIN books_has_tags bht ON t.id = bht.tag_id
                INNER JOIN books b ON b.id = bht.book_id
                WHERE b.id = :id;";

        $rs = $connexion->prepare($sql);  // RecordsSet
        $rs->bindValue(':id', $id, \PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findOneById (PDO $connexion, int $id): array {
        $sql = "SELECT *
                FROM tags
                WHERE id = :id;";
            $rs = $connexion->prepare($sql);  // RecordsSet
            $rs->bindValue(':id', $id, PDO::PARAM_INT);
            $rs->execute();
            return $rs->fetch(PDO::FETCH_ASSOC);
    }
