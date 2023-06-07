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
function findOneById(\PDO $connexion, int $id)
{
    $sql =  "SELECT *
    FROM tags
    WHERE id = :id
";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}
function findAllByBookId(\PDO $connexion, $id)
{
    $sql =  "SELECT *
            FROM books b
            JOIN books_has_tags bht 
            ON bht.book_id = b.id
            JOIN tags t 
            ON t.id = bht.tag_id
            WHERE b.id = :id
            ;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
