<?php

namespace Grizzlyware\Salmon\WHMCS\Mail;

class Template extends \WHMCS\Mail\Template
{
	public function scopeName($query, $name)
	{
		$query->where('name', $name);
	}

	public function scopeType($query, $type)
	{
		$query->where('type', $type);
	}
}




