<?php

namespace core;

use PDO;
use utils\DBConnection;

class Model
{
    protected PDO $pdo;
    protected string $table;

    public function __construct()
    {
        $this->pdo = DBConnection::getInstance()->getPdo();
    }

    public function all()
    {
        $sql = "SELECT * FROM {$this->table}";
        $prepare = $this->pdo->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function find(int $id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $prepare = $this->pdo->prepare($sql);
        $prepare->bindParam(':id', $id, PDO::PARAM_INT);
        $prepare->execute();
        $result = $prepare->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function create($data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        $prepare = $this->pdo->prepare($sql);
        $i = 1;
        foreach ($data as $value) {
            $prepare->bindValue($i, $value);
            $i++;
        }
        $prepare->execute();
        return true;
    }

    public function insertGetId($data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        $prepare = $this->pdo->prepare($sql);
        $i = 1;
        foreach ($data as $value) {
            $prepare->bindValue($i, $value);
            $i++;
        }
        $prepare->execute();
        return $this->pdo->lastInsertId();
    }

    public function update(array $data, int $id)
    {
        $updateSql = implode(", ", array_map(fn($key) => "$key = ?", array_keys($data)));
        $sql = "UPDATE {$this->table} SET {$updateSql} WHERE id = ?";
        $prepare = $this->pdo->prepare($sql);
        $i = 1;
        foreach ($data as $value) {
            $prepare->bindValue($i, $value);
            $i++;
        }
        $prepare->bindValue($i, $id, PDO::PARAM_INT);
        $prepare->execute();
        return true;
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $prepare = $this->pdo->prepare($sql);
        $prepare->bindParam(':id', $id, PDO::PARAM_INT);
        $prepare->execute();
        return true;
    }

    public function where(array $conditions)
    {
        $whereConditions = [];
        foreach ($conditions as $column => $value) {
            $whereConditions[] = "$column = ?";
        }

        $whereClause = implode(" AND ", $whereConditions);

        $sql = "SELECT * FROM {$this->table} WHERE $whereClause";

        $prepare = $this->pdo->prepare($sql);
        $prepare->execute(array_values($conditions));

        $result = $prepare->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

}