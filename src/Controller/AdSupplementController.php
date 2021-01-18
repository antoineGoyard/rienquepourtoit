<?php

namespace App\Controller;

use App\Entity\AdSupplement;
use App\Form\AdSupplementType;
use App\Repository\AdSupplementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ad/supplement")
 */
class AdSupplementController extends AbstractController
{
    /**
     * @Route("/", name="ad_supplement_index", methods={"GET"})
     */
    public function index(AdSupplementRepository $adSupplementRepository): Response
    {
        return $this->render('ad_supplement/index.html.twig', [
            'ad_supplements' => $adSupplementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ad_supplement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $adSupplement = new AdSupplement();
        $form = $this->createForm(AdSupplementType::class, $adSupplement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($adSupplement);
            $entityManager->flush();

            return $this->redirectToRoute('ad_supplement_index');
        }

        return $this->render('ad_supplement/new.html.twig', [
            'ad_supplement' => $adSupplement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ad_supplement_show", methods={"GET"})
     */
    public function show(AdSupplement $adSupplement): Response
    {
        return $this->render('ad_supplement/show.html.twig', [
            'ad_supplement' => $adSupplement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ad_supplement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AdSupplement $adSupplement): Response
    {
        $form = $this->createForm(AdSupplementType::class, $adSupplement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ad_supplement_index');
        }

        return $this->render('ad_supplement/edit.html.twig', [
            'ad_supplement' => $adSupplement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ad_supplement_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AdSupplement $adSupplement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adSupplement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($adSupplement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ad_supplement_index');
    }
}
