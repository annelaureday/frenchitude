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


class LoginController extends Controller
{

    public function login(Request $request, AuthenticationUtils $authenticationUtils)
    {   
        $user = new Utilisateurs();
        $form = $this->createForm(LoginType::class, $user);

        $form->handleRequest($request);
        $error = $authenticationUtils->getLastAuthenticationError();
        
        if ($form->isSubmitted() && $form->isValid()) {
            return $this->render("profil/profil.html.twig", $array);
        }

        $Utilisateur = $this->getUser();
        if($Utilisateur == null){
           $Utilisateur = new Utilisateurs(); 
        }

        $array = Array(
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
                            "status" => $Utilisateur->getStatus(),
                        ]);
                        
        return $this->render("home/index.html.twig", $array);
                    
    }
    
    public function postregister(Request $request, UserPasswordEncoderInterface $encoder)
    {
        if (!filter_var($request->get("email"), FILTER_VALIDATE_EMAIL)) 
        {
            return $this->returnJson(array("path" => "/register", "Syntaxe email invalid"), 401);
        }
        $er = $this->getDoctrine()->getRepository(Utilisateurs::class);
        $userOne = $er->findOneBy(["email" => $request->get("email")]);

        if (!$userOne) {
            
            $em = $this->getDoctrine()->getManager();

            $user = new Utilisateurs();
            $user->setCivilite($request->get("civilite"));
            $user->setPseudo($request->get("pseudo"));
            $user->setMdp($encoder->encodePassword($user, $request->get("mdp")));
            $user->setEmail($request->get("email"));
            $user->setNom($request->get("nom"));
            $user->setPrenom($request->get("prenom"));
            $user->setAdresse($request->get("adresse"));
            $user->setVille($request->get("ville"));
            $user->setCodePostal($request->get("code_postal"));
            



            try 
            {
                $em->persist($user);
                $em->flush();
            }
            catch(\Doctrine\ORM\EntityNotFoundException $e)
            {
                return $this->returnJson(array("path" => "/register", "Error : Invalid request"), 501);
            }

            if (true) {
                // $data = array("path" => "/home", "Good", $request->get("name")); 
                return $this->returnJson(array("path" => "/home", "User created"), 201);
            }else {
                return $this->returnJson(array("path" => "/register", "User not created"), 401);
            }
        }else {
            return $this->returnJson(array("path" => "/register", "User existed"), 401);
        }
    }
    public function logout()
    {
        return $this->redirectToRoute('login');
    }

    private function returnJson($data, $statuscode)
    {
        return new Response ( json_encode($data) , $statuscode, array("Content-Type" => "application/json") );
    }


}