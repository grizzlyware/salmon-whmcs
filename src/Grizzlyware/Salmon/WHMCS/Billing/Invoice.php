<?php

namespace Grizzlyware\Salmon\WHMCS\Billing;

use Grizzlyware\Salmon\WHMCS\User\Client;

class Invoice extends \WHMCS\Billing\Invoice
{
	public function client()
	{
		return $this->belongsTo(Client::class, 'userid');
	}

	public function log($message)
	{
		$this->client->log("[Invoice ID: {$this->id}]: {$message}");
	}
}


