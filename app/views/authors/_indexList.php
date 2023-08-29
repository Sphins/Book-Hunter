<?php foreach ($authors as $author) : ?>
    <article class="bg-gray-800 rounded-lg overflow-hidden shadow-lg">
        <img class="w-full h-48 object-cover" src="<?php echo $author['picture']; ?>" alt="auteur" />
        <div class="p-4">
            <h3 class="text-xl font-bold mb-2"><?php echo $author['firstname']; ?> <?php echo $author['lastname']; ?></h3>
            <div class="flex items-center mb-2">
                <span class="text-yellow-500 mr-1"><i class="fas fa-star"></i></span>
                <span><?php $notes = number_format($author['notation'], 2);
                        echo $notes; ?></span>
            </div>
            <p class="text-gray-400">
                <?php echo $author['biography']; ?>
            </p>
            <a href="authors/<?php echo $author['id']; ?>/<?php echo Core\Tools\slugify($author['firstname']) ?>-<?php echo Core\Tools\slugify($author['lastname']) ?>" class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white">
                More details
            </a>
        </div>
    </article>
<?php endforeach; ?>