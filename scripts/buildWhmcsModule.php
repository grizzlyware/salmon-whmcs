<?php

require __DIR__ . "/../vendor/autoload.php";

$whmcsTemplatePath = realpath(__DIR__ . "/../dist/whmcs/modules/addons/salmon_template");

exec("cd {$whmcsTemplatePath}; composer update");
