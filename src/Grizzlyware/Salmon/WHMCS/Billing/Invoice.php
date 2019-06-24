<?php

namespace Grizzlyware\Salmon\WHMCS\Billing;

use Grizzlyware\Salmon\WHMCS\User\Client;

class Invoice extends \WHMCS\Billing\Invoice
{
	public function client()
	{
		return $this->belongsTo(Client::class, 'userid');
	}
}


