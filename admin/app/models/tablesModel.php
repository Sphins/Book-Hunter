<?php

namespace App\Models\TablesModel;

class Model
{
    protected $connexion;

    public function __construct($connexion)
    {
        $this->connexion = $connexion;
    }

    public function getTables()
    {
        $query = "SHOW TABLES FROM " . DB_NAME;
        $result = $this->connexion->query($query);

        $tables = [];
        while ($row = $result->fetch(\PDO::FETCH_NUM)) {
            if (!$this->isManyToManyTable($row[0])) {
                $tables[] = $row[0];
            }
        }
        return $tables;
    }

    public function getTableData($tableName)
    {
        $query = $this->connexion->prepare("SELECT * FROM $tableName");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    protected function isManyToManyTable($tableName)
    {
        // Combien de fois la table est-elle référencée par d'autres tables ?
        $referencedCountQuery = $this->connexion->prepare("
            SELECT COUNT(*)
            FROM information_schema.KEY_COLUMN_USAGE
            WHERE TABLE_SCHEMA = :databaseName
            AND REFERENCED_TABLE_NAME = :tableName
        ");
        $referencedCountQuery->execute([':databaseName' => DB_NAME, ':tableName' => $tableName]);
        $referencedCount = $referencedCountQuery->fetchColumn();

        // Combien de tables votre table référence-t-elle elle-même ?
        $referencesCountQuery = $this->connexion->prepare("
            SELECT COUNT(DISTINCT REFERENCED_TABLE_NAME)
            FROM information_schema.KEY_COLUMN_USAGE
            WHERE TABLE_SCHEMA = :databaseName
            AND TABLE_NAME = :tableName
            AND REFERENCED_TABLE_NAME IS NOT NULL
        ");
        $referencesCountQuery->execute([':databaseName' => DB_NAME, ':tableName' => $tableName]);
        $referencesCount = $referencesCountQuery->fetchColumn();

        // Si la table référence exactement 2 autres tables et n'est pas (ou rarement) référencée par d'autres tables, 
        // alors il est probable que ce soit une table de liaison N:M.
        return $referencesCount == 2 && $referencedCount <= 1; // J'utilise <= 1 pour permettre quelques exceptions rares.
    }
}
