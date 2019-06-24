<?php

namespace Grizzlyware\Salmon\WHMCS\User;

use Grizzlyware\Salmon\WHMCS\Billing\Invoice;
use Grizzlyware\Salmon\WHMCS\Domain\Domain;
use Grizzlyware\Salmon\WHMCS\User\Client\Contact;

class Client extends \WHMCS\User\Client
{
	public function contacts()
	{
		return $this->hasMany(Contact::class, 'userid');
	}

	public function invoices()
	{
		return $this->hasMany(Invoice::class, 'userid');
	}

	public function domains()
	{
		return $this->hasMany(Domain::class, 'userid');
	}
}


