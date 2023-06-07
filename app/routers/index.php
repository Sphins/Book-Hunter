<?php
// PATTERN: /?books=index
// CTRL: booksController
// ACTION: index
// VIEW: books.index
//     > Fait appel à books._index
//     > Créer un router 'books' avec un switch !
//     > Ceci est le default

if (isset($_GET['books'])) :
    include_once '../app/controllers/booksController.php';
    App\Controllers\booksController\indexAction($connexion);

// PATTERN: /
// 	CTRL: pagesController
// 	ACTION: home
// 	VIEW: pages.home
// 		Faire appel à 
// 			- books._index
// 			- authors._index
// 	ATTENTION: 
// 		Pour les tags: Faire appel à la fonction findAllByBookId()
// 		et à la vue tags._index
else :
    include_once '../app/controllers/pagesController.php';
    App\Controllers\PagesController\homeAction($connexion);
endif;
