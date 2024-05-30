<?php
namespace App\Controllers\TagsController;
use \PDO;

function indexAction (PDO $connexion) {
    include_once '../app/models/tagsModel.php';
    $tags = \App\Models\TagsModel\findAll($connexion, 6);

    // Je charge la vue 'home' dans $content
    GLOBAL $content, $title;
    $title = "Tags";
    ob_start();
    include '../app/views/tags/index.php';
    $content = ob_get_clean();
}

function showAction (PDO $connexion, int $id) {
    // Je vais demander des données aux modèles
    include_once '../app/models/tagsModel.php';
    $tag = \App\Models\TagsModel\findOneById($connexion, $id);

    include_once '../app/models/booksModel.php';
    $books = \App\Models\BooksModel\findAllByTagId($connexion, $id);

    // Je charge la vue 'home' dans $content
    GLOBAL $content, $title;
    $title = $tag['name'];
    ob_start();
    include '../app/views/tags/show.php';
    $content = ob_get_clean();
}