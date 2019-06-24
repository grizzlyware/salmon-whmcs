<?php

namespace Grizzlyware\Salmon\WHMCS\Billing\Payment;

use Grizzlyware\Salmon\WHMCS\Billing\Invoice;
use Grizzlyware\Salmon\WHMCS\User\Client;

class Transaction extends \WHMCS\Billing\Payment\Transaction
{
	public function client()
	{
		return $this->belongsTo(Client::class, 'userid');
	}

	public function invoice()
	{
		return $this->belongsTo(Invoice::class, 'invoiceid');
	}
}