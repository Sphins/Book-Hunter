<?php

namespace App\Models\BooksModel;


function findAll(\PDO $connexion, int $limit = 6, int $offset = 0)
{
    $sql = "SELECT b.*, a.firstname, a.lastname, a.id as authors_id,
            AVG(un.note) AS notation, c.name AS categorie_name
            FROM books b
            LEFT JOIN users_notations un ON b.id = un.book_id
            JOIN authors a ON a.id = b.author_id
            JOIN categories c ON c.id = b.category_id
            GROUP BY b.id
            ORDER BY b.title ASC
            LIMIT :limit
            OFFSET :offset
            ;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':limit', $limit, \PDO::PARAM_INT);
    $rs->bindValue(':offset', $offset, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findPopulars(\PDO $connexion, $limitation)
{
    $sql = "SELECT b.*, a.firstname, a.lastname,a.id as authors_id, 
            AVG(un.note) AS notation, c.name AS categorie_name
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

function findOneByBookId(\PDO $connexion, int $id)
{
    $sql = "SELECT b.*, a.firstname, a.lastname, a.id as authors_id, 
            c.id as categorie_id, c.name as categorie_name,
            AVG(un.note) AS notation, c.name AS category
            FROM books b
            LEFT JOIN users_notations un ON b.id = un.book_id
            JOIN authors a ON a.id = b.author_id
            JOIN categories c ON c.id = b.category_id
            WHERE b.id = :id
    ;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

function findAllByAuthorId(\PDO $connexion, $id)
{
    $sql = "SELECT b.*
            FROM books b
            WHERE b.author_id = :id
            ORDER BY b.title ASC
            ;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllBooksByCategoriesId(\PDO $connexion, $id)
{
    $sql = "SELECT b.*, a.firstname, a.lastname, a.id as authors_id,
            AVG(un.note) AS notation, c.name AS categorie_name
            FROM books b
            LEFT JOIN users_notations un ON b.id = un.book_id
            JOIN authors a ON a.id = b.author_id
            JOIN categories c ON c.id = b.category_id
            WHERE category_id = :id
            GROUP BY b.id
            ORDER BY b.title ASC
            ;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllBooksByTagsId(\PDO $connexion, $id)
{
    $sql = "SELECT b.*, a.firstname, a.lastname, a.id AS authors_id,
            AVG(un.note) AS notation, c.name AS categorie_name
            FROM books b
            LEFT JOIN users_notations un ON b.id = un.book_id
            JOIN authors a ON a.id = b.author_id
            JOIN categories c ON c.id = b.category_id
            JOIN books_has_tags bt ON bt.book_id = b.id
            WHERE bt.tag_id = :id
            GROUP BY b.id
            ORDER BY b.title ASC
            ;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
