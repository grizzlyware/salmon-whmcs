<?php

require __DIR__ . "/../vendor/autoload.php";

$rootPath = realpath(__DIR__ . "/../");
$whmcsTemplatePath = realpath(__DIR__ . "/../dist/whmcs/modules/addons/salmon");

exec("cd {$whmcsTemplatePath}; php {$rootPath}/composer.phar update");