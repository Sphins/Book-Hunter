<?php
switch ($_GET['ajax']):

    case 'loadMoreBooks':
        include_once '../app/controllers/booksController.php';
        APP\Controllers\BooksController\loadMoreAction($connexion, $_GET['offSet']);
        break;

    case 'loadMoreAuthors':
        include_once '../app/controllers/authorsController.php';
        APP\Controllers\AuthorsController\loadMoreAction($connexion, $_GET['offSet']);
        break;

endswitch;
