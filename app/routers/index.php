<?php
// PATTERN: /?books=index
// CTRL: booksController
// ACTION: index
// VIEW: books.index
//     > Fait appel à books._index
//     > Créer un router 'books' avec un switch !
//     > Ceci est le default

if (isset($_GET['books']) && $_GET['books'] === 'index') :
    include_once '../app/controllers/booksController.php';
    App\Controllers\booksController\indexAction($connexion);


// PATTERN: /?authors=index
// CTRL: authorsController
// ACTION: index
// VIEW: authors.index
// 	> Fait appel à authors._index
// 	> Créer un router 'authors' avec un switch !
// 	> Ceci est le default

elseif (isset($_GET['authors']) && $_GET['authors'] === 'index') :
    include_once '../app/controllers/authorsController.php';
    App\Controllers\authorsController\indexAction($connexion);

// PATTERN: /?books=show&id=x
// CTRL: booksController
// ACTION: show
// VIEW: books.show
// 	> Nouveau case dans le switch du router 'books

elseif (isset($_GET['books']) && $_GET['books'] === 'show' && isset($_GET['id'])) :
    include_once '../app/controllers/booksController.php';
    App\Controllers\booksController\showAction($connexion, $_GET['id']);

// PATTERN: /?authors=show&id=x
// CTRL: authorsController
// ACTION: show
// VIEW: authors.show
// 	> Nouveau case dans le switch du router 'authors'
// 	Faire appel à la fonction findAllByAuthorId()
// 	et à la vue: books._indexByAuthorId (ou directement faire un foreach sur le résultat de la fonction)

elseif (isset($_GET['authors']) && $_GET['authors'] === 'show' && isset($_GET['id'])) :
    include_once '../app/controllers/authorsController.php';
    App\Controllers\AuthorsController\showAction($connexion, $_GET['id']);

// PATTERN: /?categories=show&id=x
// CTRL: categoriesController
// ACTION: show
// VIEW: categories.show
// 	> Nouveau case dans le switch du router 'categories'

elseif (isset($_GET['categories']) && $_GET['categories'] === 'show' && isset($_GET['id'])) :
    include_once '../app/controllers/categoriesController.php';
    App\Controllers\CategoriesController\showAction($connexion, $_GET['id']);

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
