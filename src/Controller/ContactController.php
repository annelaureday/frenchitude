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

    public function index(\Swift_Mailer $mailer, Request $request, AuthenticationUtils $authenticationUtils) //je crée une fonction nommée index, qui utilise l'extension Swift_Mailer
    {
       
        
        $message = (new \Swift_Message($request->get("Subject"))) //requête pour afficher le sujet dans l'entête du mail (info)
            ->setFrom('alday@hotmail.fr')
            ->setTo('contactfrenchitude@gmail.com') //adresse où on envoie le message
            ->setBody( //corps du message
                $this->renderView( 
                    'message/message.html.twig',  //nom de la page qui va être envoyée dans le message, elle gère le contenu du message que nous allons recevoir
                    array('name' => $request->get("Name"),"sujet" => $request->get("Subject")  ,"message" => $request->get("Message"))  //on va chercher les données dans les inputs : on crée la variable et on l'associe à une requête 
                                                                                                                                        //la requête utilise les name des inputs du formulaire, dans contact.html.twig.
                ),
                'text/html'
            )
            
        ;

        $mailer->send($message);
  

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
            'controller_name' => 'ContactController',
            "formulaire" => $form->createView(),
            "error" => $error,
            "Utilisateur" => [
                "nom" => $Utilisateur->getNom(),
                "prenom" => $Utilisateur->getPrenom(),
            ]);
        
        return $this->render("contact/contact.html.twig", $array); 
    }
    }
