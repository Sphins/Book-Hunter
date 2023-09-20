<?php

include_once '../app/models/tablesModel.php';
include_once '../app/controllers/tablesController.php';

use App\Models\TablesModel\Model;  // Modifiez le chemin pour pointer vers la classe Model
use App\Controllers\TablesController;

$model = new Model($connexion); // Créez une instance de la classe Model

$tables = $model->getTables();  // Utilisez l'instance pour appeler la méthode getTables

$handled = false; // Cette variable permet de savoir si une table a été traitée

foreach ($tables as $table) {
    if ($_GET['table'] === $table) {
        // Ici, vous appelez la fonction ou le contrôleur approprié
        // Assurez-vous que la méthode showTable est appelée correctement si elle est également une méthode d'une classe.
        TablesController\showTable($connexion, $table);
        $handled = true;
        break; // Sortez de la boucle une fois que vous avez trouvé la table
    }
}

// Si aucune table n'a été traitée, vous pouvez gérer le cas par défaut
if (!$handled) {
    // Gérez le cas où la table n'existe pas
    // Par exemple, redirigez vers une page d'erreur ou vers un contrôleur par défaut
    echo 'Error 404';
}
