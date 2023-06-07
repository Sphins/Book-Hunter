<?php

namespace App\Controllers\authorsController;

use App\Models\authorsModel;

function indexAction(\PDO $connexion)
{

    include_once '../app/models/authorsModel.php';
    $authors = AuthorsModel\findAll($connexion);

    global $content, $title, $authors_title;
    $title = "Authors-index";
    $authors_title = "Authors";
    ob_start();
    include '../app/views/authors/_index.php';
    $content = ob_get_clean();
}
