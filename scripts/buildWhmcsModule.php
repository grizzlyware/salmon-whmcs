<?php

require __DIR__ . "/../vendor/autoload.php";

$rootPath = realpath(__DIR__ . "/../");
$whmcsTemplatePath = realpath(__DIR__ . "/../dist/whmcs/modules/addons/salmon");

// Update the WHMCS Salmon module
exec("cd {$whmcsTemplatePath}; php {$rootPath}/composer.phar update");

// Set the correct version in the WHMCS addon
$whmcsComposerLock = json_decode(file_get_contents($whmcsTemplatePath . "/composer.lock"));

// Find it
foreach($whmcsComposerLock->packages as $package)
{
	if($package->name != "grizzlyware/salmon-whmcs") continue;
	$salmonWhmcsVersion = $package->version;
}

if(!isset($salmonWhmcsVersion)) throw new \Exception("Could not find Salmon-WHMCS version!");

// Update the version in the WHMCS addon config file
$addonDefinition = file_get_contents($whmcsTemplatePath . "/salmon.php");
$addonDefinition = preg_replace('/\'version\' => \'(\S+)\'/', '\'version\' => \'' . $salmonWhmcsVersion . '\'', $addonDefinition);
file_put_contents($whmcsTemplatePath . "/salmon.php", $addonDefinition);

// Zip it up! (Source: https://stackoverflow.com/a/4914807/1002843)
$destinationDir = realpath($whmcsTemplatePath . "/../");

// Initialize archive object
$zip = new \ZipArchive();
$zip->open($destinationDir . '/salmon.zip', \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

// Create recursive directory iterator
$files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($whmcsTemplatePath), \RecursiveIteratorIterator::LEAVES_ONLY);

foreach($files as $name => $file)
{
	// Skip directories
	if(!$file->isDir())
	{
		// Get real and relative path for current file
		$filePath = $file->getRealPath();
		$relativePath = substr($filePath, strlen($whmcsTemplatePath) + 1);

		// Add current file to archive
		$zip->addFile($filePath, $relativePath);
	}
}

// We're done!
echo "Success! WHMCS module packaged successfully.\n";


