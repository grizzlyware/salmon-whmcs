<?php

namespace Grizzlyware\Salmon\WHMCS\Service;

use Grizzlyware\Salmon\WHMCS\Helpers\ConfigurableOptions as ConfigurableOptionsHelper;
use Grizzlyware\Salmon\WHMCS\Product\Product;
use Grizzlyware\Salmon\WHMCS\User\Client;

class Service extends \WHMCS\Service\Service
{
	public function client()
	{
		return $this->belongsTo(Client::class, 'userid');
	}

	public function product()
	{
		return $this->belongsTo(Product::class, 'packageid');
	}

	public function getConfigOptionValue($group, $option)
	{
		return ConfigurableOptionsHelper::getValue($group, $option, $this);
	}

	public function configurableOptionValues()
	{
		return $this->hasMany(ConfigurableOptionValue::class, 'relid');
	}

	public function log($message)
	{
		$this->client->log("[Service ID: {$this->id}]: {$message}");
	}
}


