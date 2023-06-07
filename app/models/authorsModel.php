<?php

namespace App\Models\AuthorsModel;

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
