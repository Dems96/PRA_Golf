<?php

namespace App\Controller;

use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index()
    {

     $players = file_get_contents('players.json');
     $json = json_decode($players);
     $lien="form";
     $variabledoc="file";
     $method='formulaire()';

     return $this->render('index/index.html.twig', [
         'json'=>$json,
         'lien'=>$lien,
         'variable'=>$variabledoc,
         'method'=>$method,
     ]);


    }

    public function setJson()
    {
        $s_file = 'players.json';
        $s_fileData = file_get_contents($s_file);
        $tableau_pour_json = array();

        $reader = new Xlsx();
        $reader->setReadFilter(new MyReadFilter());
        $reader->setReadDataOnly(true);

        $spreadsheet = $reader->load("test.xlsx");
        $workSheet = $spreadsheet->getActiveSheet();

        $workSheet->getCell('B10')->getValue(); // Récupère le nom de la compétition
        $nbJoueurs = $workSheet->getCell('B166')->getValue(); // Récupère le nombre de joueurs
        $dateCompet = $workSheet->getCell('E63')->getValue(); // Récupère la date de la compétition
        $nomjoueur = $workSheet->getCell('B25')->getValue();
        $repJoueur = $workSheet->getCell('I25')->getValue();

        $players = new stdClass();
        $tabPlayers = [];

        for ($i = 14; $i < $nbJoueurs;$i++){

            $name = $players->name = $workSheet->getCell('B'.$i)->getValue();
            $rep = $players->rep = $workSheet->getCell('I'.$i)->getValue();

            if ($name != null && $rep != null){
                array_push($tableau_pour_json, array('nom'=>$name, 'rep'=>$rep));

                $contenu_json = json_encode($tableau_pour_json); //convertir le tableau au format json
                $fichierStockage = 'players.json';
                $fichierStockage = fopen($fichierStockage, 'a+'); //ouvre le fichier

                $ligne = fgets($fichierStockage); //lit la 1ere ligne du fichier

                fseek($fichierStockage, 0); //le curseur se remet au debut du fichier
                fputs($fichierStockage, $contenu_json);
                file_put_contents('players.json', $contenu_json);
                fclose($fichierStockage);  //ferme le fichier
            }
        }
        return $this->redirectToRoute('index');
    }

}

class MyReadFilter implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter
{

    public function readCell($column, $row, $worksheetName = '')
    {
        // Read title row and rows 20 - 30
        if ($row > 9 && $row < 170) {
            return true;
        }
        return false;
    }
}
