<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function index()
    {
        // render a template
        $view = new ViewGenerator(['view' => 'home', 'title' => 'Accueil']);
        return new Response($view->generate());
    }
}
