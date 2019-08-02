<?php

namespace Grizzlyware\Salmon\WHMCS\User;

trait CanBeLabelled
{
	public function getLabelAttribute()
	{
		$parts = [$this->firstName, $this->lastName];
		if($this->companyname) $parts[] = "({$this->companyname})";
		return implode(" ", $parts);
	}

	public function getLabelShortAttribute()
	{
		return implode(" ", [$this->firstName, $this->lastName]);
	}
}

