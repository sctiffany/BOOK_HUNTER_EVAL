<?php 
namespace App\Models\CollectionsModel;
use \PDO;


function addOneById (PDO $connexion, int $id) {
    $sql = "INSERT INTO users_collections (user_id, book_id, created_at)
            VALUES (1, :id, NOW());";
        $rs = $connexion->prepare($sql);  // RecordsSet
        $rs->bindValue(':id', $id, PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetch(PDO::FETCH_ASSOC);
}