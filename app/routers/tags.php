<?php

use App\Controllers\TagsController;

use function App\Controllers\TagsController\showAction;

include '../app/controllers/tagsController.php';

switch ($_GET['tags']):
    case 'show':
        // Action : show
        TagsController\showAction($connexion, $_GET['id']);
        //bookID ?
        break;
    default:
        // ACTION : index
        TagsController\indexAction($connexion);
        break;
endswitch;