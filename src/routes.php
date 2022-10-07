<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



$routes = new RouteCollection();

//['name' => 'world'] second parameter will be set if no {name} passed
$routes->add('hello', new Route('/hello/{name}', [
    'name' => 'world',  '_controller' => 'App\Controller\GreetingController::hello'

]));
$routes->add('bye', new Route('/bye', [

    '_controller' => 'App\Controller\GreetingController::bye'

]));
$routes->add('about', new Route('/a-propos', [

    '_controller' => 'App\Controller\GreetingController::about'

]));
