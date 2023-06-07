<?php

namespace App\Models\TagsModel;

function findAll(\PDO $connexion)
{
    $sql = "SELECT * 
    FROM tags
    ORDER BY name ASC";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
