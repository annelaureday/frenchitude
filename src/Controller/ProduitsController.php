<?php

namespace App\Controller;

use App\Entity\Utilisateurs;
use App\Form\LoginType;
use App\Entity\Produits;
use App\Form\ProduitsType;
use App\Form\ProduitEditType;


use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/produits")
 */
class ProduitsController extends Controller
{
    /**
     * @Route("/", name="produits_index", methods="GET")
     */
    public function index(ProduitsRepository $produitsRepository, Request $request, AuthenticationUtils $authenticationUtils): Response
    {
        $user = new Utilisateurs();
        $form = $this->createForm(LoginType::class, $user);

        $form->handleRequest($request);

        $error = $authenticationUtils->getLastAuthenticationError();

        $er = $this->getDoctrine()->getRepository(Utilisateurs::class);
        $Utilisateur = $this->getUser();


        if($Utilisateur == null)
        {
            $Utilisateur = new Utilisateurs(); 
        }

       
        return $this->render('produits/index.html.twig', [
            'produits' => $produitsRepository->findAll(),
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
                ]
            ]);
    }

    /**
     * @Route("/new", name="produits_new", methods="GET|POST")
     */
    public function new(Request $request, AuthenticationUtils $authenticationUtils): Response
    {
        $user = new Utilisateurs();
        $form = $this->createForm(LoginType::class, $user);

        $form->handleRequest($request);

        $error = $authenticationUtils->getLastAuthenticationError();

        $er = $this->getDoctrine()->getRepository(Utilisateurs::class);
        $Utilisateur = $this->getUser();


        if($Utilisateur == null)
        {
            $Utilisateur = new Utilisateurs(); 
        }

        $produit = new Produits();
        $formAj = $this->createForm(ProduitsType::class, $produit);
        $formAj->handleRequest($request);

        if ($formAj->isSubmitted() && $formAj->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $file = $formAj['photo']->getData();
            // compute a random name and try to guess the extension (more secure)
            $extension = $file->guessExtension();
            if (!$extension) {
                // extension cannot be guessed
                $extension = 'jpeg';
            }
            $name = 2018 . "_" . rand(1, 99999) .'.' . $extension;
            $file->move("assets/static/images", $name);
            dump($produit);
            $produit->setPhoto("$name");
            $em->persist($produit);
            $em->flush();

            return $this->redirectToRoute('produits_index');
        }

        return $this->render('produits/new.html.twig', [
            'produit' => $produit,
            'form' => $formAj->createView(),
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
                ]
        ]);
    }

    /**
     * @Route("/{id}", name="produits_show", methods="GET")
     */
    public function show(Produits $produit, Request $request, AuthenticationUtils $authenticationUtils): Response
    {
        $user = new Utilisateurs();
        $form = $this->createForm(LoginType::class, $user);

        $form->handleRequest($request);

        $error = $authenticationUtils->getLastAuthenticationError();

        $er = $this->getDoctrine()->getRepository(Utilisateurs::class);
        $Utilisateur = $this->getUser();


        if($Utilisateur == null)
        {
            $Utilisateur = new Utilisateurs(); 
        }

        return $this->render('produits/show.html.twig', [
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
                ]
            ]);
    }

    /**
     * @Route("/{id}/edit", name="produits_edit", methods="GET|POST")
     */
    public function edit(Request $request, Produits $produit, AuthenticationUtils $authenticationUtils): Response
    {
        $user = new Utilisateurs();
        $form = $this->createForm(LoginType::class, $user);

        $form->handleRequest($request);

        $error = $authenticationUtils->getLastAuthenticationError();

        $er = $this->getDoctrine()->getRepository(Utilisateurs::class);
        $Utilisateur = $this->getUser();


        if($Utilisateur == null)
        {
            $Utilisateur = new Utilisateurs(); 
        }

        $formAj = $this->createForm(ProduitEditType::class, $produit);
        $formAj->handleRequest($request);

        if ($formAj->isSubmitted() && $formAj->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('produits_edit', ['id' => $produit->getId()]);
        }

        return $this->render('produits/edit.html.twig', [
            'produit' => $produit,
            'form2' => $formAj->createView(),
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
                ]
        ]);
    }

    /**
     * @Route("/{id}", name="produits_delete", methods="DELETE")
     */
    public function delete(Request $request, Produits $produit, AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produit->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($produit);
            $em->flush();
        }

        return $this->redirectToRoute('produits_index');
    }
}
