<?php

require_once '../app/models/categoriesModel.php';

use App\Models\CategoriesModel;

?>

<main class="w-full p-3">
    <div class="bg-gray-700 rounded-lg shadow-lg p-4">
        <div class="flex flex-wrap">
            <div class="w-full lg:w-1/3 px-1 lg:px-4 mb-4">
                <img class="w-full h-auto rounded-lg" src="https://source.unsplash.com/random/800x600/?book" alt="livre" />
            </div>
            <div class="w-full lg:w-2/3 px-1 lg:px-4 mb-4">
                <h2 class="font-bold text-2xl mb-2"><?php echo $book['title']; ?></h2>
                <p class="text-gray-300 mb-4">
                    Par
                    <a href="?authors=show&id=<?php echo $book['authors_id']; ?>" class="hover:text-red-500 underline font-medium"><?php echo $book['firstname']; ?> <?php echo $book['lastname']; ?></a>
                </p>
                <p class="text-gray-300 mb-4">Sortie le <?php

                                                        $date = new DateTime($book['publicated_at']);
                                                        // $date->setLocale('fr_FR');
                                                        $formattedDate = $date->format('d F Y');

                                                        echo $formattedDate; ?>

                </p>
                <p class="text-gray-300 mb-4">Genre: <?php echo $book['category']; ?></p>
                <div class="flex items-center mb-4">
                    <span class="text-yellow-500 mr-1">
                        <i class="fas fa-star"></i>
                    </span>
                    <span><?php
                            $notes = number_format($book['notation'], 2);
                            echo $notes; ?></span>
                </div>
                <div class="flex flex-wrap">
                    <?php

                    $tags = CategoriesModel\findAllByBookId($connexion, $book['id']);

                    foreach ($tags as $tag) : ?>
                        <a href="#" class="bg-gray-500 text-white px-3 py-1 rounded-full text-sm font-semibold mr-2 hover:bg-gray-800 hover:text-white"><?php echo $tag['tags']; ?></a>
                    <?php endforeach; ?>
                </div>
                <a href="#" class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">
                    Ajouter à ma collection
                </a>
            </div>
        </div>
        <div>
            <h3 class="font-bold text-lg mb-2">Résumé</h3>
            <p class="text-gray-300">
                <?php echo $book['resume']; ?>
            </p>
        </div>
    </div>
</main>