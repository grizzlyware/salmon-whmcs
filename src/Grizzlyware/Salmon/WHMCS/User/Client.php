<?php

namespace Grizzlyware\Salmon\WHMCS\User;

use Grizzlyware\Salmon\WHMCS\Billing\Invoice;
use Grizzlyware\Salmon\WHMCS\Domain\Domain;
use Grizzlyware\Salmon\WHMCS\Service\Service;
use Grizzlyware\Salmon\WHMCS\User\Client\Contact;

class Client extends \WHMCS\User\Client
{
	use CanBeLabelled;

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

	public function services()
	{
		return $this->hasMany(Service::class, 'userid');
	}

	public function log($message)
	{
		\logActivity($message, $this->id);
	}
}


