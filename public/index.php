<?php
function dump(...$vars) {
    echo '<pre>';
    var_dump(...$vars);
    echo '</pre>';
}

spl_autoload_register(function ($class) {
    $class = str_replace('App\\', '', $class); 
    require_once "../src/$class.php";
});

require '../routes.php';

use App\Router;

$router = new Router($_SERVER['REQUEST_URI']);
$match = $router->match();
if($match){
    if(is_callable($match['action'])) {
        call_user_func($match['action']);
    } elseif (is_array($match['action'])) {
        $className = $match['action'][0];
        $controller = new $className();
        $method = $match['action'][1];
        $controller->$method();
    }
} else {
    echo '404 - page not found';
}