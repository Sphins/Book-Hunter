<?php
// ROUTER PRINCIPAL

// BOOKS.INDEX: Liste des books
// PATTERN: ?books=index
// CTRL: booksController
// ACTION: index
if (isset($_GET['books'])) :
    include_once '../app/routers/books.php';

// AUTHORS.INDEX: Liste des authors
// PATTERN: ?authors=index
// CTRL: authorsController
// ACTION: index
elseif (isset($_GET['authors'])) :
    include_once '../app/routers/authors.php';

// CATEGORIES.INDEX /Liste des livres d'une categories
// PATTERN: /?categories=show&id=x
//CTRL: categoriesController
//ACTION: show
elseif (isset($_GET['categories'])) :
    include_once '../app/routers/categories.php';

// TAGS.INDEX /Liste des livres d'un tags
// PATTERN: /?tags=show&id=x
//CTRL: tagsController
//ACTION: show
elseif (isset($_GET['tags'])) :
    include_once '../app/routers/tags.php';


//Route AJAX

elseif (isset($_GET['ajax'])) :
    include_once '../app/routers/ajax.php';

// PATTERN: /
// CTRL: pagesController
// ACTION: home
// VIEW: pages/home.php
else :
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;


// // PATTERN: /?collections=create
// // CTRL: collectionsController
// // ACTION: create
// // REDIRECT: books.show avec un message dans la session	
// // 	> Le livre a bien été ajouté à votre collection

// elseif (isset($_GET['collections']) && $_GET['collection'] === 'create') :
//     include_once '../app/controllers/collectionsController.php';
//     App\Controllers\CollectionsController\createAction($connexion);
