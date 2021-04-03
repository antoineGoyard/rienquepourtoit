<?php

namespace App\Controller;

use App\Entity\Ad;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(Request $request): Response
    {
        $ads = $this->getDoctrine()
        ->getRepository(Ad::class)
        ->findBy([],['created_at' => 'desc']); //order them by date of creation
        
        return $this->render('front/default/home.html.twig', [
            'controller_name' => 'DefaultController',
            'ads' => $ads
        ]);
    }

}

