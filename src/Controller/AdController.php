<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\City;
use DateTime;
use App\Entity\Ad;
use App\Entity\Picture;
use App\Form\AdType;
use App\Form\AdEditType;
use App\Repository\AdRepository;
use App\Repository\CityRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * @Route("/ad")
 */
class AdController extends AbstractController
{
    /**
     * @Route("/", name="ad_index", methods={"GET"})
     */
    public function index(AdRepository $adRepository): Response
    {
        return $this->render('ad/index.html.twig', [
            'ads' => $adRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ad_new", methods={"GET","POST"})
     */
    public function new(Request $request,CityRepository $cityRepository): Response
    {
        $ad = new Ad();
        $form = $this->createForm(AdType::class, $ad);
        $form->handleRequest($request);   
      

        
        if ($form->isSubmitted() && $form->isValid()) {
            $ad->setPublished(false);

            $city = $cityRepository->findOneBy(['id'=>$form->get('city')->getData()]);
            $ad->setCity( $city);
            
            $ad->setCreatedAt(new DateTime('now'));
            $ad->setUser($this->getUser());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ad);
            $entityManager->flush();

            return $this->redirectToRoute('ad_supplement_new',['id'=> $ad->getId()]);
        }

        return $this->render('ad/new.html.twig', [
            'ad' => $ad,
            'form' => $form->createView(),
        ]);
    }

      /**
     * @Route("/search", name="ad_search", methods={"GET"})
     */
    public function search(Request $request,AdRepository $adRepository): Response
    {
        if (($request->get('minPrice'))=="") {
            $minPrice = 0;
        } else {
            $minPrice = $request->get('minPrice');
        }

        if (($request->get('maxPrice'))=="") {
            $maxPrice = 1000000;
        } else {
            $minPrice = $request->get('maxPrice');
        }
        
        $adHouseType = $request->get('adHouseType');
        $city = $request->get('city');
        $adType = $request->get('adType');

        return $this->render('ad/search.html.twig', [
            'ads' => $adRepository->findBySearch($adHouseType,$maxPrice,$minPrice,$city,$adType),
        ]);
     
    }

      /**
     * @Route("/full/search", name="ad_full_search", methods={"GET"})
     */
    public function fullSearch(Request $request,AdRepository $adRepository,CityRepository $cityRepository): Response
    {
       

        if (($request->get('minPrice'))=="") {
            $minPrice = 0;
        } else {
            $minPrice = $request->get('minPrice');
        }

        if (($request->get('maxPrice'))=="") {
            $maxPrice = 1000000;
        } else {
            $maxPrice = $request->get('maxPrice');
        }

        if (($request->get('roomNumber'))=="" || ($request->get('roomNumber'))==0) {
            $roomNumber = 0;
        } else {
            $roomNumber = $request->get('roomNumber');
        }

        if (($request->get('surface'))=="" || ($request->get('surface'))==0) {
            $surface = 0;
        } else {
            $surface = $request->get('surface');
        }

        if (($request->get('bathroomNumber'))=="" || ($request->get('bathroomNumber'))==0) {
            $bathroom = 0;
        } else {
            $bathroom = $request->get('bathroomNumber');
        }
        $adHouseType = $request->get('adHouseType');
        $adType = $request->get('adType');
        $distance = $request->get('distance');
     
        if (($request->get('distance'))=="" || ($request->get('distance'))==0) {
            $city = $request->get('city');
            return $this->render('ad/search.html.twig', [
                'ads' => $adRepository->findByFullSearch2($adHouseType,$maxPrice,$minPrice,$city,$adType,$roomNumber,$surface,$bathroom),
            ]);
        } else {
            $adCity = $request->get('city');
            $city = $cityRepository->find($adCity);
            return $this->render('ad/search.html.twig', [
                'ads' => $adRepository->findByFullSearch1($adHouseType,$maxPrice,$minPrice,$city,$adType,$distance,$roomNumber,$surface,$bathroom),
            ]);
        }
     
    }



    /**
     * @Route("/show/{id}", name="ad_show", methods={"GET"})
     */
    public function show(Ad $ad): Response
    {
        return $this->render('ad/show.html.twig', [
            'ad' => $ad,
        ]);
    }
    /**
     * @Route("/user", name="ad_user_show", methods={"GET"})
     */
    public function userShow(AdRepository $adRepository): Response
    {
        $user = $this->getUser();
        return $this->render('user/userAd.html.twig', [
            'ads' => $adRepository->findBy(['user'=> $user->getId()]),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ad_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ad $ad): Response
    {
        $form = $this->createForm(AdType::class, $ad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $ad->setpublished(false);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ad_user_show');
        }

        return $this->render('ad/edit.html.twig', [
            'ad' => $ad,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ad_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Ad $ad): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ad->getId(), $request->request->get('_token'))) {

            $entityManager = $this->getDoctrine()->getManager();

            foreach ( $ad->getPictures() as $picture){
                unlink($this->getParameter('pictures_directory').'/'.$picture->getName());
            }

            $entityManager->remove($ad);
            $entityManager->flush();
            
        }

        return $this->redirectToRoute('ad_user_show');
    }

    /**
     * @Route("/delete/picture/{id}",name="ad_picture_delete", methods={"DELETE"})
     */
    public function deletePicture(Picture $picture, Request $request){
        
        $data = json_decode($request->getContent(), true);
        // verifie token is valid


        if($this->isCsrfTokenValid('delete'.$picture->getId(), $data['_token'])){
            //on recupère le nom de l'image
            $name = $picture->getname();
            //on supprime le fichier
            unlink($this->getParameter('pictures_directory').'/'.$name);

            //on supprimme de la base
            $em = $this->getDoctrine()->getManager();
            $em->remove($picture);
            $em->flush();

            //on répond json
            return new JsonResponse(['success' => 1]);
        }else{
            return new JsonResponse(['error' => 'Token Invalide'], 400);
        }
    }


  

    
     
}
