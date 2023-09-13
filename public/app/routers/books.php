<?php

switch ($_GET['books']):
    case 'show':
        include_once '../app/controllers/booksController.php';
        \App\Controllers\BooksController\showAction($connexion, $_GET['id']);
        break;

    default:
        include_once '../app/controllers/booksController.php';
        \App\Controllers\BooksController\indexAction($connexion);
        break;
endswitch;
