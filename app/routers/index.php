<?php

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

include_once '../app/controllers/pagesController.php';
App\Controllers\PagesController\homeAction($connexion);
