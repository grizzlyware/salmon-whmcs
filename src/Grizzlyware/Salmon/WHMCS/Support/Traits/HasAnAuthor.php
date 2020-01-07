<?php

namespace Grizzlyware\Salmon\WHMCS\Support\Traits;

trait HasAnAuthor
{
	public function getAuthorAttribute()
	{
		$author = (object)
		[
			'name' => null,
			'type' => null,
			'email' => null,
			'model' => null
		];

		if($this->admin)
		{
			$author->name = $this->admin;
			$author->type = 'admin';
			return $author;
		}

		if($this->name)
		{
			$author->name = $this->name;
			$author->email = $this->email;
			$author->type = 'public';
			return $author;
		}

		if($this->contact)
		{
			$author->name = $this->contact->label;
			$author->email = $this->contact->email;
			$author->model = $this->contact;
			$author->type = 'contact';
			return $author;
		}

		if($this->client)
		{
			$author->name = $this->client->label;
			$author->email = $this->client->email;
			$author->model = $this->client;
			$author->type = 'client';
			return $author;
		}

		return $author;
	}
}


