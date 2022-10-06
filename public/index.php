<?php

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;



require __DIR__ . '/../vendor/autoload.php';

$request = Request::createFromGlobals();


require __DIR__ . '/../src/routes.php';


$context = new RequestContext();
$context->fromRequest($request);
$urlMatcher = new UrlMatcher($routes, $context);







try {

    //va convertir le deuxiem parametre {name} a une variable $name et _route a $_route
    extract($urlMatcher->match($request->getPathInfo()));

    ob_start();
    //after ob_start the line executed will not include the file and show it to the client but it will be stored in RAM
    //and ob_get_clean is the variable that have the output of this RAM content
    include __DIR__ . '/../src/pages/' . $_route . '.php';
    $response = new Response(ob_get_clean());

    //par default l'instance new response(param) le param sera envoyé à setContent()
    //  $response->setContent(ob_get_clean());
} catch (ResourceNotFoundException $e) {

    $response = new Response("la page demandée n'existe pas", 404);
} catch (Exception $e) {
    $response = new Response("une erreur est activée sur le serveur", 500);
}
// var_dump($request->query->all());
// die;


$response->send();
