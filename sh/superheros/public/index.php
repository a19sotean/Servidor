<?php
//Front Controller
require '../vendor/autoload.php';
require '../app/Config/parametros.php';

use App\Controller\UserController;
use App\Controller\AbilityController;
use App\Controller\CitizenController;
use App\Controller\RequestController;
use App\Controller\SuperheroController;
use App\Controller\EvolutionController;
use App\Controller\ErrorController;
use App\Core\Router;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

//var_dump($_SESSION);

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = array('profile' => 'guest');
}

$router = new Router();
// TODO: actualizar para que se muestren habilidades
$router->add(array(
    'name' => 'list superheros',
    'path' => '/^\/$/',
    'action' => [SuperheroController::class, 'listAction'],
    'profiles' => ['guest', 'citizen', 'beginner', 'expert']
));

$router->add(array(
    'name' => 'search superheros',
    'path' => '/^\/sh\/search\?name=\w*$/',
    'action' => [SuperheroController::class, 'searchAction'],
    'profiles' => ['guest', 'citizen', 'beginner', 'expert']
));

$router->add(array(
    'name' => 'register citizen',
    'path' => '/^\/citizen\/register$/',
    'action' => [CitizenController::class, 'registerAction'],
    'profiles' => ['guest']
));

$router->add(array(
    'name' => 'user login',
    'path' => '/^\/login$/',
    'action' => [UserController::class, 'logInAction'],
    'profiles' => ['guest']
));

$router->add(array(
    'name' => 'user logout',
    'path' => '/^\/logout$/',
    'action' => [UserController::class, 'logOutaction'],
    'profiles' => ['citizen', 'beginner', 'expert']
));
// TODO: actualizar
$router->add(array(
    'name' => 'request insert',
    'path' => '/^\/request\/new$/',
    'action' => [RequestController::class, 'insertAction'],
    'profiles' => ['citizen']
));

$router->add(array(
    'name' => 'list requests',
    'path' => '/^\/request\/list$/',
    'action' => [RequestController::class, 'listFromSuperheroIdAction'],
    'profiles' => ['beginner', 'expert']
));

$router->add(array(
    'name' => 'check request done',
    'path' => '/^\/request\/checkDone/',
    'action' => [RequestController::class, 'checkDoneAction'],
    'profiles' => ['beginner', 'expert']
));
// TODO: actualizar para que se inserten habilidades
$router->add(array(
    'name' => 'insert Superhero',
    'path' => '/^\/sh\/register$/',
    'action' => [SuperheroController::class, 'registerAction'],
    'profiles' => ['expert']
));
// TODO: actualizar para que se inserten habilidades
$router->add(array(
    'name' => 'update Superhero',
    'path' => '/^\/sh\/update\/\d+$/',
    'action' => [SuperheroController::class, 'editAction'],
    'profiles' => ['expert']
));

$router->add(array(
    'name' => 'delete Superhero',
    'path' => '/^\/sh\/delete\/\d+$/',
    'action' => [SuperheroController::class, 'deleteAction'],
    'profiles' => ['expert']
));

$request = $_SERVER['REQUEST_URI'];
$route = $router->match($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    if (array_search($_SESSION['user']['profile'], $route['profiles']) > -1) {
        $controller = new $controllerName;
        $controller->$actionName($request);
    }
} else {
    (new ErrorController)->Error404PageAction();
}
