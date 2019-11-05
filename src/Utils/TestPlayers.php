<?php
/**
 * Created by PhpStorm.
 * User: demba
 * Date: 18/10/2019
 * Time: 11:46
 */

namespace App\Utils;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class TestPlayers
{
    public function getPlayers($info)
    {

        $reader = new Xlsx();
        $reader->setReadFilter(new MyReadFilter());
        $reader->setReadDataOnly(true);

        $spreadsheet = $reader->load("test.xlsx");
        $workSheet = $spreadsheet->getActiveSheet();

        $nbJoueurs = $workSheet->getCell('B166')->getValue(); // Récupère le nombre de joueurs
        $info = $nbJoueurs;

        return $info;
    }

    public function getDate($info)
    {

        $reader = new Xlsx();
        $reader->setReadFilter(new MyReadFilter());
        $reader->setReadDataOnly(true);

        $spreadsheet = $reader->load("test.xlsx");
        $workSheet = $spreadsheet->getActiveSheet();

        $dateCompet = $workSheet->getCell('E63')->getValue(); // Récupère la date de la compétition
        $info = $dateCompet;

        return $info;
    }

    public function getNameCompet($info)
    {

        $reader = new Xlsx();
        $reader->setReadFilter(new MyReadFilter());
        $reader->setReadDataOnly(true);

        $spreadsheet = $reader->load("test.xlsx");
        $workSheet = $spreadsheet->getActiveSheet();

        $nomCompet = $workSheet->getCell('B10')->getValue(); // Récupère le nom de la compétition
        $info = $nomCompet;

        return $info;
    }
}