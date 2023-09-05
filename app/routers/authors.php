<?php
switch ($_GET['authors']):

    case 'show':
        include_once '../app/controllers/authorsController.php';
        \App\Controllers\AuthorsController\showAction($connexion, $_GET['id']);
        break;

    default:
        include_once '../app/controllers/authorsController.php';
        \App\Controllers\AuthorsController\indexAction($connexion);
        break;
endswitch;
