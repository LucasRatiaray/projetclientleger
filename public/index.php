<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

require_once dirname(__DIR__).'/vendor/autoload.php';

$request = Request::createFromGlobals();  # all data sent `by a user`


$routes = include dirname(__DIR__) . '/src/routes.php';  # all routes : 1 route = 1 page


$context = new RequestContext();  # all request data (url, method, etc...)
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context); # checker if the route exist in the collection
$controllerResolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();

try {
    $request->attributes->add($matcher->match($request->getPathInfo()));  # Add the route parameters to the request

    $controller = $controllerResolver->getController($request);  # ex: [App\Controller\HelloController, 'hello']
    $arguments = $argumentResolver->getArguments($request, $controller);  # ex: [Request $request]

    $response = call_user_func_array($controller, $arguments);  # Execute the function (controller) of the route with the arguments
} catch(ResourceNotFoundException $e) {
    $response = new Response('page non trouvé', 404);
} catch(Exception $e) {
    $response = new Response("Une erreur est subvenue (".$e->getMessage()." )", 500);
}

$response->send();
