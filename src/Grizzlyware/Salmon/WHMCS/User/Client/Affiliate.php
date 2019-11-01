<?php

namespace Grizzlyware\Salmon\WHMCS\User\Client;

use Grizzlyware\Salmon\WHMCS\User\Client;

class Affiliate extends \WHMCS\User\Client\Affiliate
{
	public function client()
	{
		return $this->belongsTo(Client::class, 'clientid');
	}
}

