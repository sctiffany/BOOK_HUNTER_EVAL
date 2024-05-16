<?php
// ROUTEUR PRINCIPAL

// ROUTE DES BOOKS
// PATTERN : /?books
// CTRL : booksController
// ACTION : indexAction
if (isset($_GET['books'])) {
    include_once '../app/controllers/booksController.php';
    \App\Controllers\BooksController\indexAction($connexion);
}
elseif (isset($_GET['authors'])) {
    include_once '../app/controllers/authorsController.php';
    \App\Controllers\AuthorsController\indexAction($connexion);
}
else {
    // ROUTE PAR DEFAUT
    // PATTERN : /
    // CTRL : pagesController
    // ACTION : homeAction
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
}