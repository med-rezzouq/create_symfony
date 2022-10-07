<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GreetingController
{

    public function hello(Request $request)
    {
        $name = $request->attributes->get('name');
        ob_start();
        //after ob_start the line executed will not include the file and show it to the client but it will be stored in RAM
        //and ob_get_clean is the variable that have the output of this RAM content
        // include __DIR__ . '/../src/pages/' . $_route . '.php';
        include __DIR__ . '/../pages/hello.php';
        return new Response(ob_get_clean());
    }

    public function bye()
    {

        ob_start();
        //after ob_start the line executed will not include the file and show it to the client but it will be stored in RAM
        //and ob_get_clean is the variable that have the output of this RAM content
        // include __DIR__ . '/../src/pages/' . $_route . '.php';
        include __DIR__ . '/../pages/bye.php';
        return new Response(ob_get_clean());
    }


    public function about()
    {

        ob_start();
        //after ob_start the line executed will not include the file and show it to the client but it will be stored in RAM
        //and ob_get_clean is the variable that have the output of this RAM content
        // include __DIR__ . '/../src/pages/' . $_route . '.php';
        include __DIR__ . '/../pages/about.php';
        return new Response(ob_get_clean());
    }
}
