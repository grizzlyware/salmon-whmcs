<?php

namespace Grizzlyware\Salmon\WHMCS\Product;

class Server extends \WHMCS\Product\Server
{
	public function getPasswordAttribute()
	{
		if(!$this->attributes['password']) return null;
		return \decrypt($this->attributes['password']);
	}

	public function setPasswordAttribute($input)
	{
		$this->attributes['password'] = \encrypt($input);
	}
}




