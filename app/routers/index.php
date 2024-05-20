<?php
// ROUTEUR PRINCIPAL

// ROUTE DES BOOKS
// PATTERN : /?books
if (isset($_GET['books'])) {
    include_once '../app/routers/books.php';
}

// ROUTE DES AUTHORS
// PATTERN : /?authors
elseif (isset($_GET['authors'])) {
    include_once '../app/routers/authors.php';
}

else {
    // ROUTE PAR DEFAUT
    // PATTERN : /
    // CTRL : pagesController
    // ACTION : homeAction
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
}