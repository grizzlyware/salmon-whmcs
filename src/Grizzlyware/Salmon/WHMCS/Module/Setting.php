<?php

namespace Grizzlyware\Salmon\WHMCS\Module;

class Setting extends \WHMCS\Module\Addon\Setting
{
	public function scopeSetting($query, $setting)
	{
		$query->where('setting', $setting);
	}

	public function getBoolValueAttribute()
	{
		return $this->value == 1 || $this->value == 'on';
	}
}

