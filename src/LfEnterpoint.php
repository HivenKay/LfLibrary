<?php
require __DIR__ . '/Lf/LfClassLoader.php';
require __DIR__ . '/Function.php';
require __DIR__ .'/Excel/ExcelUnits.php';
LfClassLoader::AutoLoad('Lf',__DIR__);
LfConfig::$DbUserName='';
LfConfig::$DbPassword='';
LfConfig::$DbDatabase='';
