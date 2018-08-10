<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController extends Controller
{
    /**
     * @Route("/about", name="about")
     */


    /*
    Ancienne fonction modifiée dessous, CPM, à supprimer:
        public function index()
    {
        return $this->render('about/index.html.twig', [
            'controller_name' => 'AboutController',
        ]);
    }
    */
    public function about()
    {
        return $this->render('about/about.html.twig', [
            'controller_name' => 'AboutController',
        ]);
    }
}
