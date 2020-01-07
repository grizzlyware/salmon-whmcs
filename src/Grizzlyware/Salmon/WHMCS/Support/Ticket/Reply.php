<?php

namespace Grizzlyware\Salmon\WHMCS\Support\Ticket;

use Grizzlyware\Salmon\WHMCS\Support\Traits\HasAnAuthor;
use Grizzlyware\Salmon\WHMCS\User\Client;

class Reply extends \WHMCS\Support\Ticket\Reply
{
	use HasAnAuthor;

	public function client()
	{
		return $this->belongsTo(Client::class, 'userid');
	}

	public function contact()
	{
		return $this->belongsTo(Client\Contact::class, 'contactid');
	}
}

