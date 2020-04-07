<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NousController extends AbstractController
{
    /**
     * @Route("/nous", name="nous")
     */
    public function index()
    {
        return $this->render('nous/index.html.twig', [
            'controller_name' => 'NousController',
        ]);
    }
}
