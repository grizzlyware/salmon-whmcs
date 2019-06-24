<?php

namespace Grizzlyware\Salmon\WHMCS\Service;

use Grizzlyware\Salmon\WHMCS\User\Client;

class Service extends \WHMCS\Service\Service
{
	public function client()
	{
		return $this->belongsTo(Client::class, 'userid');
	}
}


