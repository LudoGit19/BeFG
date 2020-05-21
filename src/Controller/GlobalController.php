<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class GlobalController extends AbstractController  // render, redirectToRoute
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home.html.twig');
    }

    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function dashboard()
    {
        return $this->render('global/dashboard.html.twig');
    }

    /**
     * @Route("/test", name="test")
     */
    public function test()
    {
        return $this->render('global/test.html.twig');
    }

     /**
     * @Route("/menu", name="menu")
     */
    public function menu()
    {
        return $this->render('global/menu.html.twig');
    }

    /**
     * @Route("/registration", name="registration")
     */
    public function registration(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $passwordCrypte = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($passwordCrypte);
            $user->setRoles("ROLE_USER");
            $em->persist($user);
            $em->flush();

            $this->addFlash(
                'success', 
                'Bravo ! Vous êtes bien inscrit. Entrez vos identifiants pour vous loger'
            );

            return $this->redirectToRoute("login");
        }
        
        return $this->render('global/registration.html.twig', [
            "form" => $form->createView()
        ]);
    }

     /**
     * @Route("/login", name="login")
     */

    public function login(AuthenticationUtils $util) {

        return $this->render('global/login.html.twig', [
            "lastUserName" => $util->getLastUserName(),
            "error" =>$util->getLastAuthenticationError()
        ]);
    }

     /**
     * @Route("/logout", name="logout")
     */

    public function logout() {


    }
    
}
