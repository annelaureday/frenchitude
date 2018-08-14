<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FicheProduitController extends Controller
{
    
    public function ficheProduit()
    {
        return $this->render('fiche_produit/fiche_produit.html.twig', [
            'controller_name' => 'FicheProduitController',
        ]);
        

        
            

    }
}
