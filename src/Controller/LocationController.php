<?php

namespace App\Controller;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocationController extends AbstractController
{
    /**
     * @Route("/location/city", name="location_search_city", methods={"GET"})
     */

    public function searchCity(Request $request,HttpClientInterface $client ): Response
    {
        $name = $request->get('name');
      
        $response = $client->request(
            'GET',
            'https://geo.api.gouv.fr/communes?nom='.$name.'&fields=departement&boost=population&limit=5'
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
        
        return new JsonResponse($content);
    }
}
