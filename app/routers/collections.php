<?php

use App\Controllers\CollectionsController;

use function App\Controllers\CollectionsController\createAction;

include '../app/controllers/collectionsController.php';

switch ($_GET['collections']):
    case 'create':
        // Action : show
        CollectionsController\createAction($connexion, $_GET['id']);
        //bookID ?
        break;
endswitch;