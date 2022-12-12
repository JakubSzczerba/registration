<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Client;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class AppController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="home")
     */
    public function homepage(Request $request)
    {
        $form = $this->createForm(RegisterType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $client = $form->getData();

            $this->entityManager->persist($client);
            $this->entityManager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('Form//register.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/client/{id}", name="clientShow")
     */
    public function clientShow(Request $request, int $id)
    {
        $client = $this->getDoctrine()->getRepository(Client::class)->find($id);

        return $this->render('Client//show.html.twig', [
            'client' => $client
        ]);
    }

    /**
     * @Route("/json/{id}", name="clientJson")
     */
    public function clientJson(Request $request, int $id)
    {
        $client = $this->getDoctrine()->getRepository(Client::class)->find($id);

        return $this->json($client);
    }

}