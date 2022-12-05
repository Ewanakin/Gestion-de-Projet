<?php

namespace App\Controller;

use Doctrine\ORM\EntityManager;
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
    public function displayName(EntityManager $em): Response
    {
        $qb = $em->createQueryBuilder();
        return $this->render('home/index.html.twig',[

        ]);
    }
}
