<?php

/*
 * This file was created by Jakub Szczerba
 * Contact: https://www.linkedin.com/in/jakub-szczerba-3492751b4/
*/

declare(strict_types=1);

namespace App\Controller;

use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function homepage(Request $request)
    {
        $form = $this->createForm(RegisterType::class);
        $form->handleRequest($request);

        return $this->render('Form//register.html.twig', [
            'form' => $form->createView()
        ]);
    }

}