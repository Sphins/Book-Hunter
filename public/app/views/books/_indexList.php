<?php

include_once '../app/models/tagsModel.php';

use App\Models\TagsModel;

foreach ($books as $book) : ?>
    <article class="bg-gray-800 rounded-lg overflow-hidden shadow-lg relative">
        <a href="categories/<?php echo $book['category_id']; ?>/<?php echo Core\Tools\slugify($book['categorie_name']); ?>" class="bg-white text-gray-800 px-2 py-1 rounded-md text-sm font-semibold absolute top-2 left-2 hover:bg-gray-500 hover:text-white"><?php echo $book['categorie_name']; ?></a>
        <img class="w-full h-48 object-cover" src="<?php echo $book['cover']; ?>" alt="Book Cover" />
        <div class="p-4">
            <div class="pb-4">
                <?php

                $tags = TagsModel\findAllByBookId($connexion, $book['id']);

                foreach ($tags as $tag) : ?>

                    <a href="tags/<?php echo $tag['id']; ?>/<?php echo Core\Tools\slugify($tag['name']); ?>" class="bg-gray-500 text-white px-3 py-1 rounded-full text-sm font-semibold mr-2 hover:bg-gray-700 hover:text-white"><?php echo $tag['name']; ?></a>

                <?php endforeach; ?>
                <span class="py-1">
                    &nbsp;
                </span>

            </div>
            <h3 class="text-xl font-bold"><?php echo $book['title']; ?></h3>
            <h4 class="text mb-2 text-gray-400"><?php echo $book['firstname']; ?> <?php echo $book['lastname']; ?></h4>
            <div class="flex items-center mb-2">
                <span class="text-yellow-500 mr-1">
                    <i class="fas fa-star"></i>
                </span>
                <span><?php
                        $notes = isset($book['notation']) && $book['notation'] !== null ? number_format($book['notation'], 2) : "0.00";
                        echo $notes; ?></span>
            </div>

            <p class="text-gray-400">
                <?php echo $book['resume']; ?>
            </p>

            <a href="books/<?php echo $book['id']; ?>/<?php echo Core\Tools\slugify($book['title']) ?>" class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">
                More details
            </a>
        </div>
    </article>
<?php endforeach; ?>