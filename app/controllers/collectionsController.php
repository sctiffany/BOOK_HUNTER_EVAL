<?php
namespace App\Controllers\CollectionsController;
use \PDO;

function createAction (PDO $connexion, int $id) {
    // Je vais demander des données aux modèles
    include_once '../app/models/collectionsModel.php';
    $collection = \App\Models\CollectionsModel\addOneById($connexion, $id);

    include_once '../app/models/booksModel.php';
    $book = \App\Models\BooksModel\findOneById($connexion, $id);

    include_once '../app/models/tagsModel.php';
    $tags = \App\Models\TagsModel\findAllByBookId($connexion, $id);

    GLOBAL $content, $title;
    $title = $book['title'];
    echo '<script>alert("Le livre a bien été ajouté à votre collection")</script>';
    ob_start();
    include '../app/views/books/show.php';
    $content = ob_get_clean();
}