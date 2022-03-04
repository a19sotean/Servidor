<?php
/**
 * @author Ruben Ramirez Rivera
 */
require_once("../app/Config/constantes.php");
require_once("../vendor/autoload.php");

use App\Controllers\SuperheroesController;
use App\Core\Router;

$router = new Router();
$router->add(array(
    'name'=>'home', 
    'path'=>'/^\/$/', 
    'action'=>[SuperheroesController::class, 'LastSuperheroesAction']));

$router->add(array(
    'name'=>'addSuperheroe', 
    'path'=>'/^\/superheroes\/add$/', 
    'action'=>[SuperheroesController::class, 'AddSuperheroeAction']));

$router->add(array(
    'name'=>'editSuperheroe',  
    'path'=>'/^\/superheroes\/edit\/[0-9]{1,3}$/', 
    'action'=>[SuperheroesController::class, 'EditSuperheroeAction']));

$router->add(array(
    'name'=>'deleteSuperheroe',  
    'path'=>'/^\/superheroes\/del\/[0-9]{1,3}$/', 
    'action'=>[SuperheroesController::class, 'DeleteSuperheroeAction']));

$router->add(array(
    'name'=>'SearchSuperheroe',  
    'path'=>'/^\/superheroes\/search$/', 
    'action'=>[SuperheroesController::class, 'GetSearchedHeroes']));

$request = str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']);
$route = $router->match($request);

if($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);

} else {
    echo "No route matched";
}

?>