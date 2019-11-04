<?php
/**
 * Created by PhpStorm.
 * User: demba
 * Date: 18/10/2019
 * Time: 11:35
 */

namespace App\Tests;
use App\Utils\TestPlayers;
use PHPUnit\Framework\TestCase;

class Excel_Info extends TestCase
{
    // recupere le nombre de joueur attendu present dans le fichier excel
    public function testGetPlayers()
    {
        $testPlayer = new TestPlayers();
        $nbPlayers = 117 .' joueurs';

        $expectedNbPlayer = $nbPlayers;

        $this->assertEquals($expectedNbPlayer, $testPlayer->getPlayers($nbPlayers));
    }

    //recupere la date attendu présent dans le fichier excel
    public function testDate()
    {
        $testPlayer = new TestPlayers();
        $dateCompet = 'mardi 6 août 2019';

        $expectedNbPlayer = $dateCompet;

        $this->assertEquals($expectedNbPlayer, $testPlayer->getDate($dateCompet));
    }

    //recupere le nom de la competition attendu présent dans le fichier excel
    public function testNomCompet()
    {
        $testPlayer = new TestPlayers();
        $nomCompet = 'TROPHEE SENIORS DU COUDRAY';

        $expectedNbPlayer = $nomCompet;

        $this->assertEquals($expectedNbPlayer, $testPlayer->getNameCompet($nomCompet));
    }
}
