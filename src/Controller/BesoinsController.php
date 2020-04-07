<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BesoinsController extends AbstractController
{
    /**
     * @Route("/besoins", name="besoins")
     */
    public function index()
    {
        return $this->render('besoins/index.html.twig', [
            'controller_name' => 'BesoinsController',
        ]);
    }
}
