<?php

require_once '../app/models/booksModel.php';

use App\Models\BooksModel;

?>

<ul class="list-disc list-inside text-gray-300">
    <?php

    $books = BooksModel\findAllByAuthorId($connexion, $author['id']);

    foreach ($books as $book) : ?>
        <li>
            <a href="books/<?php echo $book['id']; ?>/<?php echo Core\Tools\slugify($book['title']) ?>" class="hover:text-red-500 underline font-medium"><?php echo $book['title']; ?></a>
        </li>
    <?php endforeach; ?>
</ul>