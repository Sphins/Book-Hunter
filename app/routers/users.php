<?php
switch ($_GET['users']):

    case 'login':
        include_once '../app/controllers/userController.php';
        App\Controllers\UsersController\loginAction($connexion);
        break;

    case 'submit':
        include_once '../app/controllers/userController.php';
        App\Controllers\UsersController\submitAction($connexion, [
            'pseudo' => $_POST['pseudo'],
            'mdp' => $_POST['mdp']
        ]);
        break;

endswitch;
