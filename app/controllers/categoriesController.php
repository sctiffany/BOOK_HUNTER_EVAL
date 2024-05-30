<?php
namespace App\Controllers\CategoriesController;
use \PDO;

function indexAction (PDO $connexion) {
    include_once '../app/models/categoriesModel.php';
    $categories = \App\Models\CategoriesModel\findAll($connexion, 6);

    // Je charge la vue 'home' dans $content
    GLOBAL $content, $title;
    $title = "Categories";
    ob_start();
    include '../app/views/categories/index.php';
    $content = ob_get_clean();
}

function showAction (PDO $connexion, int $id) {
    // Je vais demander des données aux modèles
    include_once '../app/models/categoriesModel.php';
    $category = \App\Models\CategoriesModel\findOneById($connexion, $id);

    include_once '../app/models/booksModel.php';
    $books = \App\Models\BooksModel\findAllByCategoryId($connexion, $id);

    // Je charge la vue 'home' dans $content
    GLOBAL $content, $title;
    $title = $category['name'];
    ob_start();
    include '../app/views/categories/show.php';
    $content = ob_get_clean();
}