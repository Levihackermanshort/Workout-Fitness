<?php

// Simple routing system
$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);

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

// Load and execute controller
require_once __DIR__ . '/../app/Http/Controllers/' . $controller . '.php';
$controllerInstance = new $controller();
$controllerInstance->$action();
