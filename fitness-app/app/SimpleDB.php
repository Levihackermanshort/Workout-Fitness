<?php

// Simple in-memory database simulation for testing
class SimpleDB
{
    private static $users = [
        ['id' => 1, 'username' => 'john_doe', 'password' => 'password123', 'first_name' => 'John', 'last_name' => 'Doe'],
        ['id' => 2, 'username' => 'jane_smith', 'password' => 'password123', 'first_name' => 'Jane', 'last_name' => 'Smith'],
        ['id' => 3, 'username' => 'mike_j', 'password' => 'password123', 'first_name' => 'Mike', 'last_name' => 'Johnson'],
    ];
    
    private static $activities = [
        ['id' => 1, 'user_id' => 1, 'date' => '2024-10-15', 'activity' => 'Morning Jog', 'time_spent' => '60 mins', 'distance' => '8 km', 'set_count' => 0, 'reps' => 0, 'note' => 'Great morning run'],
        ['id' => 2, 'user_id' => 1, 'date' => '2024-10-15', 'activity' => 'Push-ups', 'time_spent' => '30 mins', 'distance' => '0', 'set_count' => 3, 'reps' => 15, 'note' => 'Standard push-ups'],
        ['id' => 3, 'user_id' => 2, 'date' => '2024-10-16', 'activity' => 'Yoga Session', 'time_spent' => '60 mins', 'distance' => '0', 'set_count' => 0, 'reps' => 0, 'note' => 'Vinyasa flow'],
    ];
    
    public static function getUserByUsername($username)
    {
        foreach (self::$users as $user) {
            if ($user['username'] === $username) {
                return $user;
            }
        }
        return null;
    }
    
    public static function getUserById($id)
    {
        foreach (self::$users as $user) {
            if ($user['id'] == $id) {
                return $user;
            }
        }
        return null;
    }
    
    public static function getActivitiesByUserId($userId)
    {
        $result = [];
        foreach (self::$activities as $activity) {
            if ($activity['user_id'] == $userId) {
                $result[] = $activity;
            }
        }
        return $result;
    }
    
    public static function getActivitiesByUserIdAndDate($userId, $date)
    {
        $result = [];
        foreach (self::$activities as $activity) {
            if ($activity['user_id'] == $userId && $activity['date'] === $date) {
                $result[] = $activity;
            }
        }
        return $result;
    }
    
    public static function addActivity($data)
    {
        $newId = count(self::$activities) + 1;
        $data['id'] = $newId;
        self::$activities[] = $data;
        return $newId;
    }
    
    public static function getAllUsers()
    {
        return self::$users;
    }
    
    public static function getAllActivities()
    {
        return self::$activities;
    }
    
    public static function getUserStats($userId)
    {
        $userActivities = self::getActivitiesByUserId($userId);
        $totalActivities = count($userActivities);
        $workoutDays = count(array_unique(array_column($userActivities, 'date')));
        
        return [
            'total_activities' => $totalActivities,
            'workout_days' => $workoutDays,
            'avg_duration' => 45 // Mock average
        ];
    }
}
