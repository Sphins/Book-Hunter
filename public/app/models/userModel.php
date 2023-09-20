<?php

namespace App\Models\UsersModel;

function findOneByPseudo(\PDO $connexion, array $data = null)
{
    $sql = "SELECT * 
    FROM users 
    where pseudo = :pseudo;
    ";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':pseudo', $data['pseudo'], \PDO::PARAM_STR);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function updateUserPassword(\PDO $connexion, $userId, $newHashedPassword)
{
    $query = "UPDATE users SET password = :password WHERE id = :id";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(':password', $newHashedPassword);
    $stmt->bindParam(':id', $userId);
    $stmt->execute();
}
