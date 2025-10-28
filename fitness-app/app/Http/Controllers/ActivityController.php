<?php

require_once __DIR__ . '/../../Models/Activity.php';

class ActivityController
{
    private $activityModel;
    
    public function __construct()
    {
        $this->activityModel = new Activity();
    }
    
    public function index()
    {
        $this->checkAuth();
        
        $userId = $_SESSION['user_id'];
        $activities = $this->activityModel->findByUserId($userId);
        
        $this->render('activities/index', ['activities' => $activities]);
    }
    
    public function create()
    {
        $this->checkAuth();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $activities = $_POST['activities'] ?? [];
            
            foreach ($activities as $activity) {
                if (!empty($activity['activity'])) {
                    $data = [
                        'user_id' => $_SESSION['user_id'],
                        'date' => $_POST['date'] ?? date('Y-m-d'),
                        'time_start' => $_POST['time_start'] ?? null,
                        'time_end' => $_POST['time_end'] ?? null,
                        'activity' => $activity['activity'],
                        'time_spent' => $activity['time_spent'] ?? '',
                        'distance' => $activity['distance'] ?? '',
                        'set_count' => $activity['set_count'] ?? 0,
                        'reps' => $activity['reps'] ?? 0,
                        'note' => $activity['note'] ?? ''
                    ];
                    
                    $this->activityModel->create($data);
                }
            }
            
            header('Location: /activities');
            exit;
        }
        
        $this->render('activities/create');
    }
    
    public function search()
    {
        $this->checkAuth();
        
        $userId = $_SESSION['user_id'];
        $activities = [];
        $searchDate = '';
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search_date'])) {
            $searchDate = $_POST['search_date'];
            $activities = $this->activityModel->findByUserIdAndDate($userId, $searchDate);
        }
        
        $this->render('activities/search', [
            'activities' => $activities,
            'searchDate' => $searchDate
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
