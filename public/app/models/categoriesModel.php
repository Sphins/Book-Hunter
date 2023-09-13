<?php

namespace App\Models\CategoriesModel;


function findAll(\PDO $connexion)
{
    $sql = "SELECT * 
            FROM categories
            ORDER BY name ASC";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
function findOneById(\PDO $connexion, $id)
{
    $sql =  "SELECT *
            FROM categories
            WHERE id = :id
    ";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}
