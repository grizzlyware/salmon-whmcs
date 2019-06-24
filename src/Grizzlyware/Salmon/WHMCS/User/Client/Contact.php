<?php

namespace Grizzlyware\Salmon\WHMCS\User\Client;

use Grizzlyware\Salmon\WHMCS\User\Client;

class Contact extends \WHMCS\User\Client\Contact
{
	public function client()
	{
		return $this->belongsTo(Client::class, "userid");
	}
}



