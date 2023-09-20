<?php

namespace App\Controllers\TablesController;

use App\Models\TablesModel\Model;

function showTablesAction(\PDO $connexion)
{
    $model = new Model($connexion);
    $tables = $model->getTables();
    include '../app/views/tables/showTables.php';
    global $tables;
}

function showTable(\PDO $connexion, $selectedTable)
{
    $model = new Model($connexion);
    $tables = $model->getTables();
    $selectedTable = $_GET['table'] ?? $tables[0];
    $data = $model->getTableData($selectedTable);

    include '../app/views/tables/show.php';

    global $content, $data;
    ob_start();
    include '../app/views/template/partials/_main.php';
    $content = ob_get_clean();
};
