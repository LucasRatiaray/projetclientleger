<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

require_once dirname(__DIR__).'/vendor/autoload.php';

$request = Request::createFromGlobals();

$routes = include dirname(__DIR__) . '/src/Routes.php';

$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);
$controllerResolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();

// On essaie de faire correspondre l'URL demandée à une route
try {
    $request->attributes->add($matcher->match($request->getPathInfo()));

    $controller = $controllerResolver->getController($request);
    $arguments = $argumentResolver->getArguments($request, $controller);

    $response = call_user_func_array($controller, $arguments);

} catch(ResourceNotFoundException $e) {
    $response = new Response('Page non trouvé', 404);
} catch(Exception $e) {
    $response = new Response("Une erreur est subvenue (".$e->getMessage()." )", 500);
}

$response->send();