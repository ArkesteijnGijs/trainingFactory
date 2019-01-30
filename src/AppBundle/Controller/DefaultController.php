<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Training;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class DefaultController extends Controller
{
    /**
     * @Route("/bezoeker/login", name="login")
     */
    public function loginAction(Request $request, AuthenticationUtils $authenticationUtils){
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('bezoeker/login.html.twig', [
            'last_username' => $lastUsername,
            'error' =>$error
        ]);
    }
    /**
     * @Route("/bezoeker/trainingsvormen")
     */
    public function adminAction(){
        $trainingsvorm = $this->getDoctrine()
            ->getRepository(Training::class)
            ->findAll();

        if (!$trainingsvorm) {
            throw $this->createNotFoundException(
                'No product found for id '
            );
        }

        return $this->render("bezoeker/trainingsvormen.html.twig",[
            'trainingsform'=>$trainingsvorm
        ]);
    }
    /**
     * @Route("/bezoeker/home")
     */
    public function testaction(){
        return $this->render('bezoeker/home.html.twig');
    }

    /**
     * @Route("/bezoeker/contact")
     */
    public function contactaction(){
        return $this->render('bezoeker/contact.html.twig');
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutaction(){
        return $this->render('bezoeker/logout.html.twig');
    }

    /**
     * @Route("bezoeker/gedrag", name="gedrag")
     */
    public function loadGedragAction(){
        return $this->render('bezoeker/gedrag.html.twig');
    }


}
