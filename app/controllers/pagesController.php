<?php
namespace App\Controllers\PagesController;

use \PDO;

function homeAction (PDO $connexion) {
    // Je vais demander des données aux modèles
    include_once '../app/models/booksModel.php';
    $books = \App\Models\BooksModel\findAll($connexion, 3);

    include_once '../app/models/authorsModel.php';
    $authors = \App\Models\AuthorsModel\findAll($connexion, 3);

    // Je charge la vue 'home' dans $content
    GLOBAL $content, $title;
    $title = "Homepage";
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}