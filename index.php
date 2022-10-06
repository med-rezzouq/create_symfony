<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require __DIR__ . '/vendor/autoload.php';

//cette fonction va recuperer toutes les variables globals get post or cookies...
$request = Request::createFromGlobals();

//$request->query->get('name','world');  //va recuperer le get name si nexiste pas elle va creer un avec valeur world

$name = $request->query->get('name', 'world');
// $name = isset($_GET['name']) ? $_GET['name'] : 'World';


$response = new Response();


//remplace la fonction headers()
$response->headers->set('Content-Type', ' text/html, charset=utf-8');
// header('Content-Type: text/html, charset=utf-8');

//printf va afficher directement mais sprintf va retourner une variable string qui peut etre passé comme paramatre

$response->setcontent(sprintf('Hello %s', htmlspecialchars($name, ENT_QUOTES)));
$response->send();
// printf('Hello %s', htmlspecialchars($name, ENT_QUOTES))
