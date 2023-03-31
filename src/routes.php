<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

# define a function to add new routes
function addNewRoute(
    RouteCollection $routes,
    string $name,
    string $routePattern,
    string $controller,
    array $paramDefault = null
) {
    if ($paramDefault == null) {
        # create a new instance of Route class with given parameters
        $newRoute = new Route($routePattern, [
            '_controller' => $controller
        ]);
    } else {
        $k = array_keys($paramDefault);
        $v = array_values($paramDefault);
        $newRoute = new Route($routePattern, [
            $k[0] => $v[0],
            '_controller' => $controller
        ]);
    }
    # add the new route to the collection
    $routes->add($name, $newRoute);
    
}



// ====================  create new routes using the function ===============

$routes = new RouteCollection();
addNewRoute($routes, 'hello', '/hello/{name}', 'App\Controller\HelloController::index', ['name' => 'World']);
addNewRoute($routes, 'about', '/a-propos', 'App\Controller\AboutController::index');
addNewRoute($routes, 'home', '/accueil', 'App\Controller\HomeController::index');
addNewRoute($routes, 'main', '/', 'App\Controller\HomeController::index');
addNewRoute($routes, 'product', '/annonce', 'App\Controller\AdController::index');



// return the RouteCollection
return $routes;
