<?php

namespace App\Controllers\authorsController;

use App\Models\authorsModel;

function indexAction(\PDO $connexion)
{

    include_once '../app/models/authorsModel.php';
    $authors = AuthorsModel\findAll($connexion);

    global $content, $title, $authors_title, $zoneScripts;
    $title = "Authors-index";
    $authors_title = "Authors";
    $zoneScripts = '<script src="./js/index.js"></script>';
    ob_start();
    include '../app/views/authors/_index.php';
    include '../app/views/js/_loadMoreAuthors.php';
    $content = ob_get_clean();
}

function showAction(\PDO $connexion, int $id)
{
    include_once '../app/models/authorsModel.php';
    $author = AuthorsModel\findOneByAuthorsId($connexion, $id);

    global $content, $title;
    $title = "Auteur-" . $author['firstname'] . ' ' . $author['lastname'];
    ob_start();
    include '../app/views/authors/show.php';
    $content = ob_get_clean();
}
function loadMoreAction(\PDO $connexion, int $offset)
{
    include_once '../app/models/authorsModel.php';
    $authors = AuthorsModel\findAll($connexion, 6, $offset);

    include '../app/views/authors/_indexList.php';
}
