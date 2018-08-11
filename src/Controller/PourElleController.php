<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PourElleController extends Controller
{
    /**
     * @Route("/pour/elle", name="pour_elle")
     */
    public function pourElle()
    {
        return $this->render('pour_elle/pour_elle.html.twig', [
            'controller_name' => 'PourElleController',
        ]);
    }
}
