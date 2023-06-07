<?php

namespace App\Controllers\booksController;

use App\Models\BooksModel;

function indexAction(\PDO $connexion)
{
    include_once '../app/models/booksModel.php';
    $books = BooksModel\findAll($connexion);

    global $content, $title, $books_title;
    $title = "Books-index";
    $books_title = "Books";
    ob_start();
    include '../app/views/books/_index.php';
    $content = ob_get_clean();
}
