<?php
require_once './config/database.php';

$controller = $_GET['controller'] ?? 'user';
$action = $_GET['action'] ?? 'login';

$controllerName = ucfirst($controller) . 'Controller';
require_once "./controllers/{$controllerName}.php";

$instance = new $controllerName();
if (method_exists($instance, $action)) {
    $instance->$action($pdo);
} else {
    echo "404 Not Found";
}

?>