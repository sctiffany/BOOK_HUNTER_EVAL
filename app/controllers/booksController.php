<?php
namespace App\Controllers\BooksController;
use \PDO;

function indexAction (PDO $connexion) {
    // Je vais demander des données aux modèles
    include_once '../app/models/booksModel.php';
    $books = \App\Models\BooksModel\findAll($connexion);


    // Je charge la vue 'home' dans $content
    GLOBAL $content, $title;
    $title = "Books";
    ob_start();
    include '../app/views/books/index.php';
    $content = ob_get_clean();
}