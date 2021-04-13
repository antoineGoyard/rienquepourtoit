<?php

namespace App\Controller;

use App\Entity\Ad;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/moderator")
 */
class ModeratorController extends AbstractController
{
  
     /**
     * @Route("/ad", name="moderator_ad", methods={"GET"})
     */
    public function userShow(): Response
    { 
        $ads = $this->getDoctrine()
        ->getRepository(Ad::class)
        ->findBy(['published' => 0]); 
        
        return $this->render('moderator/ad.html.twig', [
            'controller_name' => 'ModeratorController',
            'ads' => $ads
        ]);
    }

}