<?php

use App\Controllers\BooksController;

use function App\Controllers\BooksController\showAction;

include '../app/controllers/booksController.php';

switch ($_GET['books']):
    case 'show':
        // Action : show
        BooksController\showAction($connexion, $_GET['id']);
        //bookID ?
        break;
    default:
        // ACTION : index
        BooksController\indexAction($connexion);
        break;
endswitch;