<?php

namespace App\Models\CategoriesModel;

function findAllByBookId(\PDO $connexion, $id)
{
    $sql =  "SELECT t.name AS tags
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
