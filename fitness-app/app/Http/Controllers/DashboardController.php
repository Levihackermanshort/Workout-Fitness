<?php

require_once __DIR__ . '/../../Models/User.php';
require_once __DIR__ . '/../../Models/Activity.php';

class DashboardController
{
    private $userModel;
    private $activityModel;
    
    public function __construct()
    {
        $this->userModel = new User();
        $this->activityModel = new Activity();
    }
    
    public function index()
    {
        $this->checkAuth();
        
        $userId = $_SESSION['user_id'];
        $user = $this->userModel->findById($userId);
        $activities = $this->activityModel->findByUserId($userId);
        $stats = $this->activityModel->getStatsByUserId($userId);
        
        $this->render('dashboard', [
            'user' => $user,
            'activities' => array_slice($activities, 0, 5), // Show only recent 5 activities
            'stats' => $stats
        ]);
    }
    
    private function checkAuth()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /');
            exit;
        }
    }
    
    private function render($view, $data = [])
    {
        extract($data);
        include __DIR__ . '/../../../resources/views/' . $view . '.php';
    }
}
