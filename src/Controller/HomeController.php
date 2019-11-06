<?php

namespace App\Controller;

use App\Entity\Trou;
use App\Form\TrouType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(Request $request)
    {
        $em   = $this->getDoctrine()->getManager();
        $trou = new Trou();
        $form = $this->createForm(TrouType::class, $trou);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $em->persist($trou);
            $em->flush();
        }

        return $this->render('home/index.html.twig', [
            'form' =>  $form->createView(),
        ]);
    }

}
