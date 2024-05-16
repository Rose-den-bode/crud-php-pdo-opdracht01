<?php

require_once '../app/require.php';

// Simple router setup
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/' || $uri === '/index.php') {
    $controller = new HomeController();
    $controller->index();
} elseif ($uri === '/reservation') {
    $controller = new ReservationController();
    $controller->create();
} elseif ($uri === '/reservation/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new ReservationController();
    $controller->store();
} elseif ($uri === '/reservation/confirmation') {
    $controller = new ReservationController();
    $controller->confirmation();
} elseif ($uri === '/reservations') {
    $controller = new ReservationController();
    $controller->index();
} else {
    header('HTTP/1.0 404 Not Found');
    echo 'Page not found';
}
