<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class AdController
{
    public function index()
    {
        // render a template
        $view = new ViewGenerator(['view' => 'ad', 'title' => 'Annonce']);
        return new Response($view->generate());
    }
}
