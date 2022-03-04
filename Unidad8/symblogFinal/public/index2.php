<?php

/**
 * Index.php
 */
require_once('../vendor/autoload.php');

use Aura\Router\RouterContainer;

use Dotenv\Dotenv;

use Illuminate\Database\Capsule\Manager as Capsule;

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dotenv = Dotenv::createImmutable(__DIR__ . '../../');
$dotenv->load();
$capsule = new Capsule;
$capsule -> setAsGlobal();
$capsule->bootEloquent();

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => $_ENV['DBHOST'],
    'database' => $_ENV['DBNAME'],
    'username' => $_ENV['DBUSER'],
    'password' => $_ENV['DBPASS'],
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
    'port' => '9906'
]);


// print_r($capsule->getConnection()->getPdo());

$routerContainer = new RouterContainer();

$map = $routerContainer->getMap();
$map->get("index", "/", ['controller' => 'App\Controllers\IndexController', 'action' => 'indexAction']);

$map->get("addblog", "/addblog", ['controller' => 'App\Controllers\BlogsController', 'action' => 'getAddBlogAction']);
$map->post("saveBlog", "/addblog", ['controller' => 'App\Controllers\BlogsController', 'action' => 'getAddBlogAction']);

$map->get('about', '/about', [
    'controller' => 'App\Controllers\PagesController',
    'action' => 'aboutAction'
]);

$map->get('contact', '/contact', [
    'controller' => 'App\Controllers\PagesController',
    'action' => 'contactAction'
]);
$map->post('contactSend', '/contact', [
    'controller' => 'App\Controllers\PagesController',
    'action' => 'contactActionSend'
]);

//show
$map->get("show", "/show/{id}",  ['controller' => 'App\Controllers\IndexController', 'action' => 'showAction'])->tokens(['id'=>'\d+']);

//add usuer
$map->get("addUser", "/addUser", ['controller' => 'App\Controllers\AddUserController', 'action' => 'addAction', 'auth' => true]);
$map->post("AddUserSave", "/addUser", ['controller' => 'App\Controllers\AddUserController', 'action' => 'addAction', 'auth' => true]);

//registro
$map->get("login", "/login", ['controller' => 'App\Controllers\AuthController', 'action' => 'getLogin']);
$map->post("postLogin", "/login", ['controller' => 'App\Controllers\AuthController', 'action' => 'postLogin']);

//registro
$map->get("admin", "/admin", ['controller' => 'App\Controllers\AdminController', 'action' => 'getIndex', 'auth' => true]);

$controller = new App\Controllers\IndexController;
$matcher = $routerContainer->getMatcher();
$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);
$route = $matcher->match($request);
if (!$route) {
    echo "no route";
} else {
    // require $route->handler;

    $handlerData = $route->handler;
    $controllerName = $handlerData["controller"];
    $actionName = $handlerData["action"];

    $needsAuth = $handlerData["auth"] ?? false;
    $sessionUserId = $_SESSION["userId"] ?? null;

    if ($needsAuth && !$sessionUserId) {
        header("location: ./login");
    } else {
        $controller = new $controllerName;

        $response = $controller->$actionName($request);

        foreach ($response->getHeaders() as $name => $values) {
            foreach ($values as $value) {
                header(sprintf("%s: %s", $name, $value), false);
            }
        }
        http_Response_code($response->getStatusCode());
        echo $response->getBody();
    }
}

?>