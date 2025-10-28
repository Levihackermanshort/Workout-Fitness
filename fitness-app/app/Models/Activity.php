<?php

require_once __DIR__ . '/../SimpleDB.php';

class Activity
{
    public function create($data)
    {
        return SimpleDB::addActivity($data);
    }
    
    public function findByUserId($userId)
    {
        return SimpleDB::getActivitiesByUserId($userId);
    }
    
    public function findByUserIdAndDate($userId, $date)
    {
        return SimpleDB::getActivitiesByUserIdAndDate($userId, $date);
    }
    
    public function findById($id)
    {
        // Mock implementation
        return ['id' => $id, 'activity' => 'Mock Activity'];
    }
    
    public function getAll()
    {
        return SimpleDB::getAllActivities();
    }
    
    public function update($id, $data)
    {
        return true; // Mock update
    }
    
    public function delete($id)
    {
        return true; // Mock delete
    }
    
    public function getStatsByUserId($userId)
    {
        return SimpleDB::getUserStats($userId);
    }
}
