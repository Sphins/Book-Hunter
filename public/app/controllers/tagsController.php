<?php

namespace App\Controllers\TagsController;

use App\Models\TagsModel;
use App\Models\BooksModel;

function showAction(\PDO $connexion, int $id)
{
    include_once '../app/models/tagsModel.php';

    $tags = TagsModel\findOneById($connexion, $id);

    include_once '../app/models/booksModel.php';
    $books = BooksModel\findAllBooksByTagsId($connexion, $id);

    global $content, $title, $books_title;
    $books_title = $tags['name'];
    $title = $tags['name'];
    ob_start();
    include '../app/views/books/_index.php';
    $content = ob_get_clean();
}
