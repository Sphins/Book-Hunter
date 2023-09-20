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
    $user = UsersModel\findOneByPseudo($connexion, $data);

    if ($user && password_verify($data['mdp'], $user['password'])) :
        // Vérifiez si le hachage nécessite une mise à jour
        if (password_needs_rehash($user['password'], PASSWORD_DEFAULT)) {
            $newHashedPassword = password_hash($data['mdp'], PASSWORD_DEFAULT);
            // Mettez à jour le mot de passe haché dans la base de données
            UsersModel\updateUserPassword($connexion, $user['id'], $newHashedPassword);
        }

        $_SESSION['user'] = $user;

        header('location: ' . ADMIN_ROOT);
    else :
        header('location: ' . PUBLIC_ROOT . 'users/login');
    endif;
}
