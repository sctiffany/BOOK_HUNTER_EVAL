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

// ROUTE DES CATEGORIES
// PATTERN : /?categories
elseif (isset($_GET['categories'])) {
    include_once '../app/routers/categories.php';
}

// ROUTE DES TAGS
// PATTERN : /?tags
elseif (isset($_GET['tags'])) {
    include_once '../app/routers/tags.php';
}

else {
    // ROUTE PAR DEFAUT
    // PATTERN : /
    // CTRL : pagesController
    // ACTION : homeAction
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
}