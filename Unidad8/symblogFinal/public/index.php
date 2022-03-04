<?php
// Manejando php.ini desde código
// para que se nos muestren los errores
ini_set('display_errors', 1);
ini_set('display_starup_error', 1);
error_reporting(E_ALL);

// Inicio de sesión
session_start();

require_once '../vendor/autoload.php';
use Aura\Router\RouterContainer;
// Eloquent
use Illuminate\Database\Capsule\Manager as Capsule;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '\..');
$dotenv->load();

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => $_ENV['DBHOST'],
    'database'  => $_ENV['DBNAME'],
    'username'  => $_ENV['DBUSER'],
    'password'  => $_ENV['DBPASS'],
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();
// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();

// Diactoros
$controller = new App\Controllers\IndexController;
$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

// Contenedor de rutas
$map->get('about', '/about', [
    'controller'=>'App\Controllers\PagesController',
    'action'=>'aboutAction'
]);

$map->get('index', '/', [
    'controller'=>'App\Controllers\IndexController',
    'action'=>'indexAction'
]);

$map->get('blog.show', '/blog/{id}', [
    'controller'=>'App\Controllers\BlogsController',
    'action' => 'showBlogAction'
])->tokens(['id'=>'\d+']);

//formulario
$map->get('contact', '/contact', [
    'controller'=>'App\Controllers\PagesController',
    'action'=>'contactAction'
]);

$map->post('contactSend', '/contact', [
    'controller'=>'App\Controllers\PagesController',
    'action'=>'contactActionSend'
]);

// $map->get('showBlog', '/blog/{id}', [
//     'controller'=>'App\Controllers\BlogsController',
//     'action'=>'showBlogAction'
// ]);

$map->get("showBlog", "/blog/{id}",  [
    'controller' => 'App\Controllers\BlogsController', 
    'action' => 'showBlogAction'])->tokens(['id'=>'\d+']);




$map->get('addBlog', '/blogs/add', [
    'controller' => 'App\Controllers\BlogsController',
    'action'=>'getAddBlogAction', 'auth' => true]);

$map->post('addBlogPost', '/blogs/add', [
    'controller' => 'App\Controllers\BlogsController', 
    'action'=>'postAddBlogAction', 'auth' => true]);

$map->post('postComment', '/blogs/{id}', [
    'controller'=>'App\Controllers\ShowController', 
    'action'=>'postComment'])->tokens(['id'=>'\d+']);

// /users/login
$map->get('loginGet', '/users/login', [
    'controller' => 'App\Controllers\AuthController', 
    'action' => 'getLogin']);

$map->post('loginPost', '/users/login', [
    'controller' => 'App\Controllers\AuthController', 
    'action' => 'postLogin']);

// /users/add
$map->get('addUserGet', '/users/add', [
    'controller'=>'App\Controllers\AddUserController', 
    'action'=>'addUser', 'auth' => true]);

$map->post('addUserPost', '/users/add', [
    'controller'=>'App\Controllers\AddUserController', 
    'action'=>'addUser', 'auth' => true]);

// Admin dashboard
$map->get('adminDashboard', '/admin', [
    'controller' =>  'App\Controllers\AdminController', 
    'action' => 'getCPAdmin', 'auth' => true]);

// Logout
$map->get('logout', '/logout', [
    'controller' => 'App\Controllers\AuthController', 
    'action' => 'getLogout']);




$matcher = $routerContainer->getMatcher();
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