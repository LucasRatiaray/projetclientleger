<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class SignUpController
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

    #[Route('/creation_de_compte', name: 'creation_de_compte')]
    public function index(): Response
    {
        $html = $this->twig->render('security/singup.html.twig');
        
        return new Response($html);
    }
}

