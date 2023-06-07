<?php

namespace App\Controllers\CategoriesController;

use App\Models\CategoriesModel;
use App\Models\BooksModel;

function showAction(\PDO $connexion, int $id)
{
    include_once '../app/models/categoriesModel.php';

    $category = CategoriesModel\findOneById($connexion, $id);

    include_once '../app/models/booksModel.php';
    $books = BooksModel\findAllBooksByCategoriesId($connexion, $id);

    global $content, $title, $books_title;
    $books_title = $category['name'];
    $title = $category['name'];
    ob_start();
    include '../app/views/categories/show.php';
    $content = ob_get_clean();
}
