<?php

namespace Grizzlyware\Salmon\WHMCS\Helpers;

use Grizzlyware\Salmon\WHMCS\Service\Service;

class ConfigurableOptions
{
	public static function getValue($groupIdentifier, $optionIdentifier, Service $service)
	{
		// Fetch the group..
		$group = $service->product->configurableOptionGroups()->genericIdentifier($groupIdentifier)->first();
		if(!$group) throw new \Exception("Configurable option group not found for this services product");

		// Fetch the option..
		$option = $group->options()->genericIdentifier($optionIdentifier)->first();
		if(!$option) throw new \Exception("Configurable option not found in this group");

		// Fetch the value
		$value = $service->configurableOptionValues()->where('configid', $option->id)->first();
		if(!$value) throw new \Exception("Configurable option value not found");
		return $value;
	}
}



