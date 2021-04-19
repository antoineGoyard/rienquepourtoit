<?php

namespace App\Controller;

use App\Entity\City;
use App\Repository\CityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/city")
 */
class CityController extends AbstractController
{
    /**
     * @Route("/search", name="city_search", methods={"GET"})
     */
    public function search(CityRepository $cityRepository, Request $request): Response
    {
        $name = $request->get('name');
        $cities= $cityRepository->findByName($name);
        return new JsonResponse($cities);
   
    }
}
