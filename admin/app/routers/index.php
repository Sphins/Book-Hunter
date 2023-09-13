<?php


//Routes des users
if (isset($_GET['users'])) :
    include_once '../app/routers/users.php';
//Route par defaut
else :
    include_once '../app/controllers/userController.php';
    \app\Controllers\UserController\dashboardAction($connexion);
endif;
