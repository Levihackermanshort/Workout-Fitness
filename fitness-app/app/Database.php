<?php

class Database
{
    private static $instance = null;
    private $mysqli;

    private function __construct()
    {
        $config = require __DIR__ . '/../config/database.php';
        $db = $config['connections']['mysql'];

        $this->mysqli = new mysqli($db['host'], $db['username'], $db['password'], $db['database'], (int)$db['port']);
        if ($this->mysqli->connect_error) {
            die('Database connection failed: ' . $this->mysqli->connect_error);
        }
        $this->mysqli->set_charset($db['charset']);
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->mysqli;
    }

    private function prepareAndBind(string $sql, array $params)
    {
        $stmt = $this->mysqli->prepare($sql);
        if ($stmt === false) {
            throw new Exception('SQL prepare failed: ' . $this->mysqli->error);
        }
        if (!empty($params)) {
            $types = str_repeat('s', count($params));
            $values = array_values($params);
            $stmt->bind_param($types, ...$values);
        }
        return $stmt;
    }

    public function query(string $sql, array $params = [])
    {
        $stmt = $this->prepareAndBind($sql, $params);
        if (!$stmt->execute()) {
            throw new Exception('SQL execute failed: ' . $stmt->error);
        }
        return $stmt;
    }

    public function fetch(string $sql, array $params = [])
    {
        $stmt = $this->query($sql, $params);
        $result = $stmt->get_result();
        return $result ? $result->fetch_assoc() : null;
    }

    public function fetchAll(string $sql, array $params = [])
    {
        $stmt = $this->query($sql, $params);
        $result = $stmt->get_result();
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
    }

    public function insert(string $table, array $data)
    {
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), '?'));
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})";
        
        $stmt = $this->mysqli->prepare($sql);
        if ($stmt === false) {
            throw new Exception('SQL prepare failed: ' . $this->mysqli->error);
        }
        $types = str_repeat('s', count($data));
        $values = array_values($data);
        $stmt->bind_param($types, ...$values);
        if (!$stmt->execute()) {
            throw new Exception('Insert failed: ' . $stmt->error);
        }
        return $this->mysqli->insert_id;
    }

    public function update(string $table, array $data, string $where, array $whereParams = [])
    {
        $setParts = [];
        foreach (array_keys($data) as $col) {
            $setParts[] = "$col = ?";
        }
        $setClause = implode(', ', $setParts);
        $sql = "UPDATE {$table} SET {$setClause} WHERE {$where}";

        $stmt = $this->mysqli->prepare($sql);
        if ($stmt === false) {
            throw new Exception('SQL prepare failed: ' . $this->mysqli->error);
        }
        $params = array_merge(array_values($data), array_values($whereParams));
        $types = str_repeat('s', count($params));
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }
        return $stmt->execute();
    }

    public function delete(string $table, string $where, array $params = [])
    {
        $sql = "DELETE FROM {$table} WHERE {$where}";
        $stmt = $this->prepareAndBind($sql, $params);
        return $stmt->execute();
    }
}
