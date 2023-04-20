<?php

namespace App\Controller;

use App\model\Model;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdsController
{
    private $twig;

    /**
     * AdsController constructor.
     * @param Environment $twig
     */
    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__).'/View');
        $this->twig = new \Twig\Environment($loader);
    }

    #[Route('/annonces', name: 'annonces')]
    public function index(): Response
    {
        /*$model = new Model();
        $ad = $model->getAds();*/

        $html = $this->twig->render('ads/index.html.twig', [
            /*'users' => $users*/
        ]);
        
        return new Response($html);
    }
}

