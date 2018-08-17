<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{

    public function index(\Swift_Mailer $mailer, Request $request) //je crée une fonction nommée index, qui utilise l'extension Swift_Mailer
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

        return $this->render('contact/contact.html.twig', [   //une fois le formulaire envoyé, on reste sur la page contact
            'controller_name' => 'contactController',
        ]);
    }
}


