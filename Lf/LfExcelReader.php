<?php
/**
 * Created by PhpStorm.
 * User: HivenKay
 * Date: 15/9/30
 * Time: 上午10:55
 */
require_once DIR_COMMON.'Lf/Excel/ExcelUnits.php';
class LfExcelReader {
    static function ReadExcel($FilePath) {
        $ExcelUnit = new ExcelUnits();
        $data = $ExcelUnit->read($FilePath);
        return $data;
    }
}