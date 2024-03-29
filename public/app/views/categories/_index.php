<?php

include_once '../app/models/categoriesModel.php';

use App\Models\CategoriesModel;

?>

<ul class="list-reset">
    <?php

    $categories = CategoriesModel\findAll($connexion);

    foreach ($categories as $category) : ?>
        <li>
            <a class="text-gray-300 hover:text-white" href="categories/<?php echo $category['id']; ?>/<?php echo Core\Tools\slugify($category['name']); ?>"><?php echo $category['name']; ?></a>
        </li>
    <?php endforeach; ?>
</ul>