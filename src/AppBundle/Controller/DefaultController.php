<?php

namespace AppBundle\Controller;

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
     * @Route("/bezoeker/home")
     */
    public function testaction(){
        return $this->render('bezoeker/home.html.twig');
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutaction(){
        return $this->render('bezoeker/logout.html.twig');
    }


}
