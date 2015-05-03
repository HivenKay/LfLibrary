<?php
require __DIR__.'/Lf/LfClassLoader.php';
require __DIR__.'/Function.php';
LfClassLoader::AutoLoad('Lf',__DIR__);
LfConfig::$DbUserName='root';
LfConfig::$DbPassword='';
LfConfig::$DbDatabase='jxdz';
