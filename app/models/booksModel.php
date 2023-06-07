<?php

namespace App\Models\BooksModel;


function findAll(\PDO $connexion)
{
    $sql = "SELECT b.*, a.firstname, a.lastname, 
            AVG(un.note) AS notation, c.name AS category
            FROM books b
            LEFT JOIN users_notations un ON b.id = un.book_id
            JOIN authors a ON a.id = b.author_id
            JOIN categories c ON c.id = b.category_id
            GROUP BY b.id
            ;";
    $rs = $connexion->prepare($sql);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}


function findPopulars(\PDO $connexion, $limitation)
{
    $sql = "SELECT b.*, a.firstname, a.lastname, 
            AVG(un.note) AS notation, c.name AS category
            FROM users_notations un
            JOIN books b ON b.id = un.book_id
            JOIN authors a ON a.id = b.author_id
            JOIN categories c ON c.id = b.category_id
            GROUP BY b.id
            ORDER BY notation DESC
            LIMIT :limitation
            ;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':limitation', $limitation, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
