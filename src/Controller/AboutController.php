<?php

namespace App\Controller;

use App\Model\User;
use Symfony\Component\HttpFoundation\Response;

class AboutController
{
    public function index()
    {
        // data from the database
        $user = new User();


        // render a template
        $view = new ViewGenerator(['view' => 'about', 'title' => 'A propos']);
        return new Response($view->generate(['users' => $user->getUsers()]));
    }
}
