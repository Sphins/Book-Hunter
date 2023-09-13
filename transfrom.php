<?php

$host = '127.0.0.1:3306';
$db   = 'book_hunter';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// 1. Récupérez tous les utilisateurs et leurs mots de passe
$query = $pdo->query("SELECT id, password FROM users");
$users = $query->fetchAll();

// 2. Hachez chaque mot de passe et 3. Mettez à jour la base de données
foreach ($users as $user) {
    $hashedPassword = password_hash($user['password'], PASSWORD_BCRYPT);
    $pdo->prepare("UPDATE users SET password = ? WHERE id = ?")
        ->execute([$hashedPassword, $user['id']]);
}

echo "All passwords have been hashed and updated.";
