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
    $data = $model->getTableData($selectedTable);
    $title = $selectedTable;
    include '../app/views/tables/show.php';

    global $content, $data, $title;
    $title = $selectedTable;
    ob_start();
    include '../app/views/template/partials/_main.php';
    $content = ob_get_clean();
};

function createForm(\PDO $connexion, $selectedTable)
{
    $model = new Model($connexion);
    $columns = $model->getTableStructure($selectedTable);
    $foreignKey = $model->getForeignKeys($selectedTable);
    $columsForeingnKey = $model->getDataFromForeingnKeys($foreignKey);

    // 1. Récupérer les métadonnées pour toutes les tables
    $allTables = $model->getAllTables();
    $nmRelations = [];

    foreach ($allTables as $table) {
        $metadata = $model->getMetadata($table);
        if ($metadata && isset($metadata['type']) && $metadata['type'] === 'nm') {
            if (($metadata['tables']['from']['name'] === $selectedTable && $metadata['tables']['from']['displayInForm']) ||
                ($metadata['tables']['to']['name'] === $selectedTable && $metadata['tables']['to']['displayInForm'])
            ) {
                $nmRelations[] = $metadata;
            }
        }
    }

    // 2. Récupérer les données nécessaires pour ces relations N:M
    $nmData = [];
    foreach ($nmRelations as $relation) {
        $relatedTable = ($relation['tables']['from']['name'] === $selectedTable) ? $relation['tables']['to']['name'] : $relation['tables']['from']['name'];
        $nmData[$relatedTable] = $model->getNMData($relation);
    }

    include '../app/views/form/createForm.php';

    global $content, $title, $selectedTable, $columns, $columsForeingnKey, $nmData;
    $title = $selectedTable;
    ob_start();
    include '../app/views/template/partials/_main.php';
    $content = ob_get_clean();
}
