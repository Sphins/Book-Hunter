<main class="w-full md:w-3/4 p-3">
    <div class="bg-gray-700 rounded-lg shadow-lg p-4">
        <div class="flex flex-wrap">
            <div class="w-full lg:w-1/3 px-1 lg:px-4 mb-4">
                <img class="w-full h-auto rounded-lg" src="https://source.unsplash.com/random/800x600/?author" alt="auteur" />
            </div>
            <div class="w-full lg:w-2/3 px-1 lg:px-4 mb-4">
                <h2 class="font-bold text-2xl mb-2"><?php echo $author['firstname']; ?> <?php echo $author['lastname']; ?></h2>
                <p class="text-gray-300 mb-4">Biographie:</p>
                <p class="text-gray-300 mb-4">
                    <?php echo $author['biography']; ?>
                </p>
                <div class="flex items-center mb-4">
                    <span class="text-yellow-500 mr-1">
                        <i class="fas fa-star"></i>
                    </span>
                    <span><?php $notes = number_format($author['notation'], 2);
                            echo $notes; ?></span>
                </div>
                <?php include_once '../app/views/books/_indexByAuthorId.php'; ?>
            </div>
        </div>
    </div>
</main>