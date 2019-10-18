<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class formcontroller extends AbstractController
{
    /**
     * @Route("/form",name="Formulaire")
     */
    public function formulaire()
    {
        $request = Request::createFromGlobals();
        $request->query->get('file');
        $marche = "marche";
        $request->getMethod();
        //$doc = $this->get('file');
        //$doc = var_dump($doc);


        return $this->render('index/form.html.twig',
            [
                'MARCHE' => $marche,
                'document' => $request,
            ]);
    }
}
