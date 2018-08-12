<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PourLuiController extends Controller
{
    /**
     * @Route("/pour/lui", name="pour_lui")
     */
    public function pourLui()
    {
        return $this->render('pour_lui/pour_lui.html.twig', [
            'controller_name' => 'PourLuiController',
        ]);
    }
}
