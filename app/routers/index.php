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

// ROUTE DES BOOKS
// PATTERN : /?booksID=...
// CTRL : booksController
// ACTION : showAction
elseif (isset($_GET['bookID'])) {
    include_once '../app/controllers/booksController.php';
    \App\Controllers\BooksController\showAction($connexion, $_GET['bookID']);
}

// ROUTE DES AUTHORS
// PATTERN : /?authors
// CTRL : authorsController
// ACTION : indexAction
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