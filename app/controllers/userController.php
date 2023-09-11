<?php

namespace App\Controllers\UsersController;

use App\Models\UsersModel;

function loginAction(\PDO $connexion)
{
    global $title, $content;
    $title = "login";
    ob_start();
    include '../app/views/users/usersLogin.php';
    $content = ob_get_clean();
}

function submitAction(\PDO $connexion, array $data = null)
{
    include '../app/models/userModel.php';
    $user = UsersModel\findOneByPseudoPsw($connexion, $data);

    if ($user) :
        header('location: ');
    else :
        header('location: http://localhost/scripts_serveurs/Book-Hunter/public/users/login');
    endif;
}
