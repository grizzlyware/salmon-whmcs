<?php

namespace Grizzlyware\Salmon\WHMCS\User\Traits;

/**
 * @property-read string $label
 * @property-read string $label_short
 */
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

