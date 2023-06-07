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