<?php

namespace Grizzlyware\Salmon\WHMCS\User;

use Grizzlyware\Salmon\WHMCS\User\Client\Contact;

class Client extends \WHMCS\User\Client
{
	public function contacts()
	{
		return $this->hasMany(Contact::class, "userid");
	}
}


