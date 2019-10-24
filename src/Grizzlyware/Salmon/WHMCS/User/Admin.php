<?php

namespace Grizzlyware\Salmon\WHMCS\User;

class Admin extends \WHMCS\User\Admin
{
	public function getLabelAttribute()
	{
		return (string) $this->firstName . " " . $this->lastName;
	}
}


