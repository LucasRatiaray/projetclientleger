<?php

namespace App\Controller;

use App\Model\User;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function index()
    {
        // render a template
        $view = new ViewGenerator('home');
        return new Response($view->generate());
    }
}
