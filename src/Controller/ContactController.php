<?php

namespace App\Controller;

use App\Entity\Utilisateurs;
use App\Form\LoginType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ContactController extends Controller
{
    
    public function contact(Request $request, AuthenticationUtils $authenticationUtils)
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
            'controller_name' => 'HomeController',
            "formulaire" => $form->createView(),
            "error" => $error,
            "Utilisateur" => [
                "nom" => $Utilisateur->getNom(),
                "prenom" => $Utilisateur->getPrenom(),
            ]);
        
        return $this->render("contact/contacts.html.twig", $array); 
    }
    }
