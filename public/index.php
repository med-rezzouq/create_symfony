<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require __DIR__ . '/../vendor/autoload.php';


$map = [
    '/hello' => 'hello.php',
    '/bye' => 'bye.php',
    '/a-propos' => 'about.php'
];

$request = Request::createFromGlobals();
$path = $request->getPathInfo();
$response = new Response();

if (isset($map[$path])) {
    ob_start();
    //after ob_start the line executed will not include the file and show it to the client but it will be stored in RAM
    //and ob_get_clean is the variable that have the output of this RAM content
    include __DIR__ . '/../src/pages/' . $map[$path];
    $response->setContent(ob_get_clean());
} else {
    $response->setStatusCode(404);
    $response->setContent('Not Found');
}

$response->send();
