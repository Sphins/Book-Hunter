<?php

require_once '../app/models/tagsModel.php';

use App\Models\TagsModel;

?>

<ul class="list-reset">
    <?php

    $tags = TagsModel\findAll($connexion);

    foreach ($tags as $tag) : ?>
        <li>
            <a class="text-gray-300 hover:text-white" href="tags/<?php echo $tag['id']; ?>/<?php echo Core\Tools\slugify($tag['name']); ?>"><?php echo $tag['name']; ?></a>
        </li>
    <?php endforeach; ?>
</ul>