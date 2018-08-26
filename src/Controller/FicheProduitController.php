<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Entity\Utilisateurs;
use App\Form\LoginType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * @Route("/details/produit")
 */

class FicheProduitController extends Controller
{
    /**
     * @Route("/{id}", name="produits_show2", methods="GET")
     */
    public function ficheProduit(Produits $produit, Request $request, AuthenticationUtils $authenticationUtils): Response
    {

        $user = new Utilisateurs();
        $form = $this->createForm(LoginType::class, $user);

        $form->handleRequest($request);

        $error = $authenticationUtils->getLastAuthenticationError();

        $er = $this->getDoctrine()->getRepository(Utilisateurs::class);

        $Utilisateur = $this->getUser();
        dump($Utilisateur);
        if($Utilisateur == null){
        $Utilisateur = new Utilisateurs(); 
        }
        dump($Utilisateur);
        
        $array = Array(
            'produit' => $produit,
            'formulaire' => $form->createView(),
            "error" => $error,
            "Utilisateur" => [
                "id" => $Utilisateur->getId(),
                "pseudo" => $Utilisateur->getPseudo(),
                "adresse" => $Utilisateur->getAdresse(),
                "code_postal" => $Utilisateur->getCodePostal(),
                "ville" => $Utilisateur->getVille(),
                "nom" => $Utilisateur->getNom(),
                "prenom" => $Utilisateur->getPrenom(),
                "email" => $Utilisateur->getEmail(),
                "mdp" => $Utilisateur->getMdp(),
                "status" => $Utilisateur->getStatus(),
            ]);
        
        return $this->render("fiche_produit/fiche_produit.html.twig", $array); 
    }
}