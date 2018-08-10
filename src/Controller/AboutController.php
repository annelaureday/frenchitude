<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController extends Controller
{
    /**
     * @Route("/about", name="about")
     */


   
    public function about()
    {
        return $this->render('about/about.html.twig', [
            'controller_name' => 'AboutController',
        ]);
    }
}
