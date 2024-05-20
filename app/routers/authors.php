<?php

use App\Controllers\AuthorsController;

use function App\Controllers\AuthorsController\showAction;

include '../app/controllers/authorsController.php';

switch ($_GET['authors']):
    case 'show':
        // Action : show
        AuthorsController\showAction($connexion, $_GET['id']);
        //bookID ?
        break;
    default:
        // ACTION : index
        AuthorsController\indexAction($connexion);
        break;
endswitch;