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
//     if ($_POST){    
//         $em = $this->getDoctrine()->getManager();

//             $utilisateur1 = $em->getRepository(Utilisateurs::class)->findOneBy(["id" => $request->get("id")]);

//             $utilisateur1->setPseudo($request->get("pseudo"));
//             $utilisateur1->setAdresse($request->get("adresse"));
//             $utilisateur1->setCodePostal($request->get("code_postal"));
//             $utilisateur1->setVille($request->get("ville"));
//             $utilisateur1->setNom($request->get("nom"));
//             $utilisateur1->setPrenom($request->get("prenom"));
//             $utilisateur1->setEmail($request->get("email"));
//             $utilisateur1->setMdp($request->get("mdp"));



//             try 
//             {
//                 $em->persist($utilisateur1);
//                 $em->flush();
//             }
//             catch(\Doctrine\ORM\EntityNotFoundException $e)
//             {
//                 return $this->returnJson(array("path" => "/profil", "Error : Invalid request"), 501);
//             }
// }
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
                // "setnom" => $Utilisateur->setNom($nom),
                // "setprenom" => $Utilisateur->setPrenom($prenom),
                // "setemail" => $Utilisateur->setEmail($email),
            ]);
            return $this->render("profil/profil.html.twig", $array);     
    }
}
