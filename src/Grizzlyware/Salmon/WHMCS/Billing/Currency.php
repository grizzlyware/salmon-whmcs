<?php

namespace Grizzlyware\Salmon\WHMCS\Billing;

use Grizzlyware\Salmon\WHMCS\User\Client;

class Currency extends \WHMCS\Billing\Currency
{
	public function clients()
	{
		return $this->hasMany(Client::class, 'currencyid');
	}
}


