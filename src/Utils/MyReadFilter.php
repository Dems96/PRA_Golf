<?php
/**
 * Created by PhpStorm.
 * User: demba
 * Date: 18/10/2019
 * Time: 13:36
 */

namespace App\Utils;


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
