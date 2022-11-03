<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, ContactRepository $contactRepository): Response
    {
        $contact = new Contact;
        $form= $this->createForm(ContactFormType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $contactRepository->save($contact,true);
            return $this->redirectToRoute('app_main',[],Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form'=>$form
        ]);
    }
}
