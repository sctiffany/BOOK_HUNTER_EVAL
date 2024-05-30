<?php

use App\Controllers\CategoriesController;

use function App\Controllers\CategoriesController\showAction;

include '../app/controllers/categoriesController.php';

switch ($_GET['categories']):
    case 'show':
        // Action : show
        CategoriesController\showAction($connexion, $_GET['id']);
        //bookID ?
        break;
    default:
        // ACTION : index
        CategoriesController\indexAction($connexion);
        break;
endswitch;