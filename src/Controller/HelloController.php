<?php

namespace App\Controller;

use App\Model\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloController
{
    public function index(Request $request)
    {
        // render a template
        $view = new ViewGenerator('hello');
        $view->setParam(['name' => $request->attributes->get('name')]);


        return new Response($view->generate());
    }
}
