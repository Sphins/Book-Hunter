<?php

if (isset($_GET['books'])) :
    switch ($_GET['books']):
        default:
            include_once '../app/controllers/booksController.php';
            \App\Controllers\BooksController\api_indexAction($connexion);
            break;
    endswitch;
else :
endif;
