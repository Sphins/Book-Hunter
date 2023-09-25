<?php

include_once '../app/models/tablesModel.php';
include_once '../app/controllers/tablesController.php';

use App\Models\TablesModel\Model;
use App\Controllers\TablesController;

$model = new Model($connexion);
$tables = $model->getTables();

$handled = false;

// Vérifiez si le paramètre "table" est défini
$action = isset($_GET['table']) ? $_GET['table'] : null;
$tableName = isset($_GET['name']) ? $_GET['name'] : null;

switch ($action) {
    case 'show':
        if (in_array($tableName, $tables)) {
            TablesController\showTable($connexion, $tableName);
            $handled = true;
        }
        break;

    case 'form':

        if (in_array($tableName, $tables)) {
            TablesController\createForm($connexion, $tableName);
            $handled = true;
        }
        break;
}

// Si aucune table n'a été traitée
if (!$handled) {
    echo 'Error 404';
}
