<?php

namespace App\Models\UsersModel;

function findOneByPseudoPsw(\PDO $connexion, array $data = null)
{
    $sql = "SELECT * 
    FROM users u
    where u.pseudo = :pseudo
    AND u.password = :mdp;
    ";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':pseudo', $data['pseudo'], \PDO::PARAM_STR);
    $rs->bindValue(':mdp', $data['mdp'], \PDO::PARAM_STR);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}
