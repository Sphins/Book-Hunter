<?php

namespace App\Controllers\PagesController;

use App\Models\BooksModel;
use App\Models\AuthorsModel;


function homeAction(\PDO $connexion)
{
    $limitation = 3;

    include_once '../app/models/booksModel.php';
    $books = BooksModel\findPopulars($connexion, $limitation);

    include_once '../app/models/authorsModel.php';
    $authors = AuthorsModel\findPopulars($connexion, $limitation);

    global $content, $title, $books_title, $authors_title;
    $title = "Acceuil";
    $books_title = "Popular books";
    $authors_title = "Popular authors";
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}
