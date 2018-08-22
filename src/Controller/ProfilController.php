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

class ProfilController extends Controller
{
    
    public function profil(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $user = new Utilisateurs();
        $form = $this->createForm(LoginType::class, $user);

        $form->handleRequest($request);
      

        $error = $authenticationUtils->getLastAuthenticationError();

        $er = $this->getDoctrine()->getRepository(Utilisateurs::class);
        $Utilisateur = $this->getUser();

        if($Utilisateur == null){
           $Utilisateur = new Utilisateurs(); 
        }
 

        $array = Array(
            'controller_name' => 'ProfilController',
            "formulaire" => $form->createView(),
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
            ]);
            return $this->render("profil/profil.html.twig", $array);     
    }
}
