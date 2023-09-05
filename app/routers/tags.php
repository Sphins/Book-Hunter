<?php
switch ($_GET['tags']):

    case 'show':
        include_once '../app/controllers/tagsController.php';
        App\Controllers\TagsController\showAction($connexion, $_GET['id']);
        break;

endswitch;
