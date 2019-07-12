<?php

if(!defined("WHMCS")) die("This file cannot be accessed directly");

function salmon_config()
{
	return
	[
		'name' => 'Salmon Library',
		'description' => 'Adds the Salmon WHMCS framework to WHMCS: <a href="https://github.com/grizzlyware/salmon-whmcs" target="_blank">https://github.com/grizzlyware/salmon-whmcs</a> - it adds helpful functions and extends the default WHMCS models',
		'author' => 'Grizzlyware Ltd',
		'language' => 'english',
		'version' => '1.0.2'
	];
}

function salmon_output()
{
	echo salmon_config()["description"];
}

