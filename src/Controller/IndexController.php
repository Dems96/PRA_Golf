<?php

namespace App\Controller;

use Dompdf\Options;
use stdClass;
use Dompdf\Dompdf;
use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{
    /**
     * @Route("/get_pdf", name="pdf")
     */
    public function getPdf()
    {

        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);

        // Retrieve the HTML generated in our twig file
        $players = file_get_contents('players.json');
        $json = json_decode($players);
        $html = $this->render('index/index.html.twig', [
            "json" => $json,
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A3', 'paysage');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("tabJoueur.pdf", [
            "Attachment" => true
        ]);
    }

    /**
     * @Route("/send_file", name="send")
     */
    public function getFile()
    {

        return $this->render('index/form.html.twig', [

        ]);
    }

    /**
     * @Route("/index", name="index")
     */
    public function index()
    {

        $players = file_get_contents('players.json');
        $json = json_decode($players);

        return $this->render('index/index.html.twig', [
            'json' => $json,
        ]);


    }

    /**
     * @Route("/get_xlsx", name="xlsx")
     */
    public function setJson()
    {
        $tableau_pour_json = array();

        $reader = new Xlsx();
        $reader->setReadFilter(new MyReadFilter());
        $reader->setReadDataOnly(true);

        $spreadsheet = $reader->load($_GET['file']);//recois le fichier .xlsx
        $workSheet = $spreadsheet->getActiveSheet();

        $workSheet->getCell('B10')->getValue(); // Récupère le nom de la compétition
        $nbJoueurs = $workSheet->getCell('B166')->getValue(); // Récupère le nombre de joueurs

        $players = new stdClass();

        for ($i = 14; $i < $nbJoueurs; $i++) {

            $name = $players->name = $workSheet->getCell('B' . $i)->getValue();
            $rep = $players->rep = $workSheet->getCell('I' . $i)->getValue();

            if ($name != null && $rep != null) {
                array_push($tableau_pour_json, array('nom' => $name, 'rep' => $rep));

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

class TaskType extends AbstractType
{
    // ...

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
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
