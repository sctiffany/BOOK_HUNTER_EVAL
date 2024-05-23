<?php
namespace App\Models\TagsModel;
use \PDO;

function findAllByBookId (PDO $connexion, int $id): array {
        $sql = "SELECT *, t.name AS tagName
                FROM tags t
                LEFT JOIN books_has_tags bht ON t.id = bht.tag_id
                INNER JOIN books b ON b.id = bht.book_id
                WHERE b.id = :id;";

        $rs = $connexion->prepare($sql);  // RecordsSet
        $rs->bindValue(':id', $id, \PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetchAll(\PDO::FETCH_ASSOC);
}