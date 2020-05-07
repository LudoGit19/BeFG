<?php

namespace App\Controller;


use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
// https://www.youtube.com/watch?v=ZBfWzWHfUJs
{
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request, EntityManagerInterface $em, \Swift_Mailer $mailer)
    {
        // $contact = new Contact();
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
 
        if ($form->isSubmitted() && $form->isValid()) { 
            $contact =$form->getData();
            $em->persist($contact);
            $em->flush();

            // dd($contact);
         // Ici nous enverrons l'e-mail
        $message = (new \Swift_Message('Hello Nouveau Contact'))
            // On attribue l'expéditeur
            ->setFrom('send@example.com')

            // On attribue le destinataire
            ->setTo('recipient@example.com')

            // On crée le texte avec la vue
            ->setBody(
                $this->renderView(
                    'emails/contact.html.twig', 
                    ['contact' => $contact]
                ),
                'text/html'
        );
            // On envoie le message
            $mailer->send($message);

        $this->addFlash('message', 'Votre message est bien envoyé à Ludovic');   // Permet un message flash de renvoi
        return $this->redirectToRoute('home');
    }
    return $this->render('contact/contact.html.twig', [
        'contactForm' => $form->createView()
        
        ]);
       
    
}
}
