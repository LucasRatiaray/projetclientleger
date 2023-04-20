<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

/**
 * Ajoute une nouvelle route à la collection de routes existante
 * @param RouteCollection $routes
 * @param string $name
 * @param string $routePattern
 * @param string $controller
 */
function addNewRoute(
    RouteCollection $routes,  # La collection de routes existante à laquelle ajouter la nouvelle route
    string $name,            # Le nom de la nouvelle route
    string $routePattern,    # Le motif d'URL pour la nouvelle route
    string $controller,      # Le contrôleur qui sera appelé lorsque la nouvelle route est atteinte
) {
    $newRoute = new Route($routePattern, [
        '_controller' => $controller
    ]);
    $routes->add($name, $newRoute);
}


$routes = new RouteCollection();

# Toutes les routes de l'application sont définies ici
addNewRoute($routes, 'accueil', '/', 'App\Controller\HomeController::index');
addNewRoute($routes, 'annonces', '/annonces', 'App\Controller\AdsController::index');
addNewRoute($routes, 'connexion', '/connexion', 'App\Controller\LoginController::index');
addNewRoute($routes, 'creation_de_compte', '/creation_de_compte', 'App\Controller\SignupController::index');

return $routes;
