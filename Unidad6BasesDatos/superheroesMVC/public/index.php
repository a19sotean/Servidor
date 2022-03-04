<?php
/*
require_once('..\vendor\autoload.php');

use App\Controllers\DefaultController;

$controller = new DefaultController();
$ruta = $_SERVER['REQUEST_URI'];
$ruta = explode("/", $ruta);
$ruta = $ruta[count($ruta) - 1];

// http://localhost/Servidor/Unidad6BasesDatos/superheroesMVC/public/index.php/numeros
// http://localhost/Servidor/Unidad6BasesDatos/superheroesMVC/public/index.php/saludo

$rutas = array(
    array("ruta" => "saludo", "controller" => "DefaultController", "action" => "saludaAction"),
    array("ruta" => "numeros", "controller" => "DefaultController", "action" => "numerosAction"),
);

// foreach ($rutas as $key => $value) {
//     if ($ruta == $value["ruta"]) {
//         $controller->$value["action"]();
//     }
// }

if ($ruta == "saludo") {
    $controller->saludaAction();
} elseif ($ruta == "numeros") {
    $controller->numerosAction();
} else {
    //$controller->errorAction();
    echo "No encontrado.";
}

/*
En lugar de if, hacer una búsqueda de la ruta:
array (
    ruta => '/saludo'
    controlador => '    '
    action => '     '
    )
*/

require_once('..\app\Config\parametros.php');
require_once('..\vendor\autoload.php');

use App\Core\Router;
use App\Controllers\SuperHeroeController;

ini_set('display_errors',1);
ini_set('display_starup_error',1);
error_reporting(E_ALL);

$router = new Router();
$router->add(array(
    'name'=>'home',
    'path'=>'/^\/$/',
    'action'=>[IndexController::class, 'IndexAction']));

$router->add(array(
    'name'=>'add_superheroe',
    'path'=>'/^\/superheroes\/add$/',
    'action'=>[SuperheroeController::class, 'AddSuperHeroeAction']));

$router->add(array(
    'name'=>'add_superheroe',
    'path'=>'/^\/superheroes\/edit\/[0-9]{1,3}$/',
    'action'=>[SuperheroeController::class, 'EditSuperHeroeAction']));

$router->add(array(
    'name'=>'add_superheroe',
    'path'=>'/^\/superheroes\/del\/[0-9]{1,3}$/',
    'action'=>[SuperheroeController::class, 'DelSuperHeroeAction']));


$request=str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']);
$route = $router->match($request);

if($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
} else {
    echo "No route";
}

?>