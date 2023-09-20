<?php
include_once '../app/models/tablesModel.php';

use App\Models\TablesModel\Model;
use Core\Tools;

$model = new Model($connexion); // Créez une instance de la classe Model

if (isset($_GET['table'])) {
    $selectedTable = $_GET['table'];
    Tools\redirectToTable($selectedTable);
}

$tables = $model->getTables(); // Utilisez l'instance pour appeler la méthode

?>

<form action="" method="get" id="tableForm" class="flex items-center text-gray-300">
    <label for="table" class="mr-4 text-lg">Modification/Supression :</label>
    <select name="table" id="table" onchange="document.getElementById('tableForm').submit();" class="bg-gray-800 text-white p-2 rounded">
        <option value="default" class="bg-gray-700">Sélectionnez une table</option>

        <?php foreach ($tables as $table) : ?>
            <option value="<?php echo $table; ?>" class="bg-gray-700"><?php echo ucfirst($table); ?></option>
        <?php endforeach; ?>
    </select>
</form>