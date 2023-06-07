<?php

namespace App\Models\AuthorsModel;

function findAll(\PDO $connexion)
{
    $sql = "SELECT a.*, AVG(un.note) AS notation
            FROM authors a
            LEFT JOIN books b ON b.author_id = a.id
            LEFT JOIN users_notations un ON un.book_id = b.id
            GROUP BY a.id
            ;";
    $rs = $connexion->prepare($sql);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
function findPopulars(\PDO $connexion, $limitation)
{
    $sql = "SELECT a.*, AVG(n.note) AS notation
            FROM authors a
            JOIN books b 
            ON b.author_id = a.id
            JOIN users_notations n 
            ON n.book_id = b.id
            GROUP BY a.id
            ORDER BY notation DESC
            LIMIT :limitation
            ;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':limitation', $limitation, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
function findOneByAuthorsId(\PDO $connexion, $id)
{
    $sql = "SELECT a.*, AVG(un.note) AS notation
            FROM authors a
            JOIN books b ON b.author_id = a.id
            JOIN users_notations un ON un.book_id = b.id
            WHERE a.id = :id
    ;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}
