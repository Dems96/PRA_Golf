<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function index()
    {
        $inputFileName = '../../export_liste_des_departs.xlsx';
        $fileObj = \PhpOffice\PhpSpreadsheet\IOFactory::load( $inputFileName );
        $spreadsheet = $fileObj->getActiveSheet($inputFileName);

        return $this->render('index/index.html.twig', [
            'spreadsheet' => $spreadsheet,
        ]);
    }
}
