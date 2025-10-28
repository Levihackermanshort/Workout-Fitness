<?php

require_once __DIR__ . '/../../Models/User.php';
require_once __DIR__ . '/../../Models/Activity.php';

class AuthController
{
    private $userModel;
    
    public function __construct()
    {
        $this->userModel = new User();
    }
    
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            
            $user = $this->userModel->authenticate($username, $password);
            
            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];
                
                header('Location: /dashboard');
                exit;
            } else {
                $error = 'Invalid username or password';
            }
        }
        
        $this->render('login', ['error' => $error ?? null]);
    }
    
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'first_name' => $_POST['first_name'] ?? '',
                'last_name' => $_POST['last_name'] ?? '',
                'weight' => $_POST['weight'] ?? 0,
                'height' => $_POST['height'] ?? 0,
                'birthday' => $_POST['birthday'] ?? '',
                'contact_number' => $_POST['contact_number'] ?? '',
                'email' => $_POST['email'] ?? '',
                'username' => $_POST['username'] ?? '',
                'password' => $_POST['password'] ?? ''
            ];
            
            try {
                $userId = $this->userModel->create($data);
                session_start();
                $_SESSION['user_id'] = $userId;
                $_SESSION['username'] = $data['username'];
                $_SESSION['first_name'] = $data['first_name'];
                $_SESSION['last_name'] = $data['last_name'];
                
                header('Location: /dashboard');
                exit;
            } catch (Exception $e) {
                $error = 'Registration failed: ' . $e->getMessage();
            }
        }
        
        $this->render('register', ['error' => $error ?? null]);
    }
    
    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /');
        exit;
    }
    
    private function render($view, $data = [])
    {
        extract($data);
        include __DIR__ . '/../../../resources/views/' . $view . '.php';
    }
}
