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

    public function getAllTables()
    {
        $query = $this->connexion->prepare("SHOW TABLES");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_COLUMN);
    }


    public function getTableData($tableName)
    {
        $query = $this->connexion->prepare("SELECT * FROM $tableName");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getTableStructure($tableName)
    {
        $query = $this->connexion->prepare("DESCRIBE $tableName");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getForeignKeys($tableName)
    {
        $query = $this->connexion->prepare("
            SELECT COLUMN_NAME, REFERENCED_TABLE_NAME 
            FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE 
            WHERE TABLE_NAME = :tableName 
            AND TABLE_SCHEMA = :databaseName
            AND REFERENCED_TABLE_NAME IS NOT NULL;
        ");
        $query->execute([':databaseName' => DB_NAME, ':tableName' => $tableName]);
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getDataFromForeingnKeys($foreignKey)
    {
        $data = [];
        foreach ($foreignKey as $keyInfo) {
            $tableName = $keyInfo['REFERENCED_TABLE_NAME'];
            $data[$keyInfo['COLUMN_NAME']] = $this->getTableData($tableName);
        }
        return $data;
    }

    public function getMetadata($tableName)
    {
        $query = $this->connexion->prepare("SHOW TABLE STATUS WHERE Name = :tableName");
        $query->execute([':tableName' => $tableName]);
        $tableStatus = $query->fetch(\PDO::FETCH_ASSOC);
        $comment = $tableStatus['Comment'];
        if (!$comment) {
            return null; // Retourne null si pas de commentaire
        }
        return json_decode($comment, true);
    }

    public function getNMData($metadata)
    {
        $relatedTable = $metadata['tables']['to']['name'];

        $query = $this->connexion->prepare("SELECT * FROM $relatedTable");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }




    protected function isManyToManyTable($tableName)
    {
        $query = $this->connexion->prepare("
            SELECT TABLE_COMMENT 
            FROM INFORMATION_SCHEMA.TABLES 
            WHERE TABLE_SCHEMA = :databaseName AND TABLE_NAME = :tableName
        ");
        $query->execute([':databaseName' => DB_NAME, ':tableName' => $tableName]);
        $comment = $query->fetchColumn();

        $metadata = json_decode($comment, true);

        return isset($metadata['type']) && $metadata['type'] == 'nm';
    }
}
