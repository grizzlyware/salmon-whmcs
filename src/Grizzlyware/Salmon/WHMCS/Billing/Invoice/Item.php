<?php

namespace Grizzlyware\Salmon\WHMCS\Billing\Invoice;

use Grizzlyware\Salmon\WHMCS\Billing\Invoice;
use Grizzlyware\Salmon\WHMCS\Domain\Domain;
use Illuminate\Database\Eloquent\Builder;

class Item extends \WHMCS\Billing\Invoice\Item
{
	public function invoice()
	{
		return $this->belongsTo(Invoice::class, 'invoiceid');
	}

	public function scopeForDomain(Builder $query)
	{
		$query->whereIn('type', Domain::$allInvoiceItemTypes);
	}

	public function scopeForDomainRenewal(Builder $query)
	{
		$query->whereIn('type', Domain::$renewalInvoiceItemTypes);
	}
}


