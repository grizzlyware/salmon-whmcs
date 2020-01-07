<?php

namespace Grizzlyware\Salmon\WHMCS\User\Client;

use Grizzlyware\Salmon\WHMCS\User\Traits\CanBeLabelled;
use Grizzlyware\Salmon\WHMCS\User\Client;

class Contact extends \WHMCS\User\Client\Contact
{
	use CanBeLabelled;

	public function client()
	{
		return $this->belongsTo(Client::class, 'userid');
	}

	public function log($message)
	{
		$this->client->log("[Contact ID: {$this->id}]: {$message}");
	}
}



