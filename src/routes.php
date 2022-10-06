<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;



$routes = new RouteCollection();

//['name' => 'world'] second parameter will be set if no {name} passed
$routes->add('hello', new Route('/hello/{name}', ['name' => 'world']));
$routes->add('bye', new Route('/bye'));
$routes->add('about', new Route('/a-propos'));
