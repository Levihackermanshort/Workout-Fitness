<?php

require_once __DIR__ . '/../SimpleDB.php';

class User
{
    public function create($data)
    {
        // For demo purposes, just return a mock ID
        return 999;
    }
    
    public function findByUsername($username)
    {
        return SimpleDB::getUserByUsername($username);
    }
    
    public function findById($id)
    {
        return SimpleDB::getUserById($id);
    }
    
    public function authenticate($username, $password)
    {
        $user = $this->findByUsername($username);
        if ($user && $user['password'] === $password) {
            return $user;
        }
        return false;
    }
    
    public function getAll()
    {
        return SimpleDB::getAllUsers();
    }
    
    public function update($id, $data)
    {
        return true; // Mock update
    }
    
    public function delete($id)
    {
        return true; // Mock delete
    }
}
