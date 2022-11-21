<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**

 * #[Route("/")]

 */

class HomeController extends AbstractController
{
    #[Route(path: "/", name: "home")]
    public function displayName(): Response
    {
        return $this->render('base.html.twig',[
            'name' => 'Allan',
        ]);
    }
}
