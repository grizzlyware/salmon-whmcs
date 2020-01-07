<?php

namespace Grizzlyware\Salmon\WHMCS\Support;

use Grizzlyware\Salmon\WHMCS\Support\Ticket\Reply;
use Grizzlyware\Salmon\WHMCS\Support\Traits\HasAnAuthor;
use Grizzlyware\Salmon\WHMCS\User\Admin;
use Grizzlyware\Salmon\WHMCS\User\Client;

class Ticket extends \WHMCS\Support\Ticket
{
	use HasAnAuthor;

	public function getMessagesAttribute()
	{
		$messages = \collect();
		$messages->push($this);

		foreach($this->replies as $reply)
		{
			$messages->push($reply);
		}

		$messages = $messages->sortBy('date');

		return $messages;
	}

	public function client()
	{
		return $this->belongsTo(Client::class, 'userid');
	}

	public function contact()
	{
		return $this->belongsTo(Client\Contact::class, 'contactid');
	}

	public function flaggedAdmin()
	{
		return $this->belongsTo(Admin::class, 'flag');
	}

	public function replies()
	{
		return $this->hasMany(Reply::class, 'tid');
	}
}

