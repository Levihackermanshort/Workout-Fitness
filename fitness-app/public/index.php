<?php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Simple routing system
$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);

// Remove base path if running in subdirectory
$basePath = '/fitness-app';
if (strpos($path, $basePath) === 0) {
    $path = substr($path, strlen($basePath));
}

// Route definitions
$routes = [
    '/' => ['AuthController', 'login'],
    '/login' => ['AuthController', 'login'],
    '/register' => ['AuthController', 'register'],
    '/logout' => ['AuthController', 'logout'],
    '/dashboard' => ['DashboardController', 'index'],
    '/activities' => ['ActivityController', 'index'],
    '/activities/create' => ['ActivityController', 'create'],
    '/activities/search' => ['ActivityController', 'search'],
];

// Find matching route
$controller = null;
$action = null;

foreach ($routes as $route => $handler) {
    if ($path === $route) {
        $controller = $handler[0];
        $action = $handler[1];
        break;
    }
}

// If no route found, redirect to home
if (!$controller) {
    header('Location: /');
    exit;
}

try {
    // Load and execute controller
    $controllerFile = __DIR__ . '/../app/Http/Controllers/' . $controller . '.php';
    if (!file_exists($controllerFile)) {
        throw new Exception("Controller file not found: $controllerFile");
    }
    
    require_once $controllerFile;
    
    if (!class_exists($controller)) {
        throw new Exception("Controller class not found: $controller");
    }
    
    $controllerInstance = new $controller();
    
    if (!method_exists($controllerInstance, $action)) {
        throw new Exception("Method not found: $controller::$action");
    }
    
    $controllerInstance->$action();
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    echo "<br>File: " . $e->getFile();
    echo "<br>Line: " . $e->getLine();
}
