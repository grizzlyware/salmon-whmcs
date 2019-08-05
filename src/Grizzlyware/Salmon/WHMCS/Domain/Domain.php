<?php

namespace Grizzlyware\Salmon\WHMCS\Domain;

use Grizzlyware\Salmon\WHMCS\Billing\Invoice\Item;
use Grizzlyware\Salmon\WHMCS\User\Client;

class Domain extends \WHMCS\Domain\Domain
{
	public static $allInvoiceItemTypes = ['Domain', 'DomainRegister', 'DomainTransfer', 'DomainAddonDNS', 'DomainAddonEMF', 'DomainAddonIDP', 'DomainGraceFee', 'DomainRedemptionFee'];
	public static $renewalInvoiceItemTypes = ['Domain'];

	public function client()
	{
		return $this->belongsTo(Client::class, 'userid');
	}

	public function invoiceItems()
	{
		return $this->hasMany(Item::class, 'relid')->forDomain();
	}

	public function renewalInvoiceItems()
	{
		return $this->hasMany(Item::class, 'relid')->forDomainRenewal();
	}

	public function log($message)
	{
		$this->client->log("[Domain ID: {$this->id}]: {$message}");
	}
}

