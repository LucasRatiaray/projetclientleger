<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class LoginController
{
    private $twig;

    /**
     * HomeController constructor.
     * @param Environment $twig
     */
    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__).'/View');
        $this->twig = new \Twig\Environment($loader);
    }

    #[Route('/connexion', name: 'connexion')]
    public function index(): Response
    {
        $html = $this->twig->render('security/login.html.twig');
        
        return new Response($html);
    }
}

