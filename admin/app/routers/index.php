<?php


//Routes des users
if (isset($_GET['users'])) :
    include_once '../app/routers/users.php';

//Routes des table
elseif (isset($_GET['table'])) :
    include_once '../app/routers/table.php';


//Routes des index
// elseif (isset($_GET['index'])) :
//     include_once '../app/controllers/userController.php';
//     \app\Controllers\UserController\dashboardAction($connexion);
//Route par defaut
else :
    include_once '../app/controllers/userController.php';
    \app\Controllers\UserController\dashboardAction($connexion);
endif;
