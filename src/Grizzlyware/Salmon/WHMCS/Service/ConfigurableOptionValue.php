<?php

namespace Grizzlyware\Salmon\WHMCS\Service;

use Grizzlyware\Salmon\WHMCS\Product\ConfigurableOptions\Group\Option;
use Illuminate\Database\Eloquent\Model;

class ConfigurableOptionValue extends Model
{
	protected $table = 'tblhostingconfigoptions';

	public function service()
	{
		return $this->belongsTo(Service::class, 'relid');
	}

	public function option()
	{
		return $this->belongsTo(Option::class, 'configid');
	}

	public function getSubOptionAttribute()
	{
		if(!$this->option) return null;
		return $this->option->subOptions()->where('id', $this->optionid)->first();
	}

	public function getValueAttribute()
	{
		switch($this->option->type)
		{
			case Option::TYPE_ENUM:
				$subOption = $this->sub_option;
				return $subOption ? $subOption->optionname : null;

			case Option::TYPE_BOOLEAN:
				return !!$this->qty;

			case Option::TYPE_QUANTITY:
				return $this->qty;

			default:
				return null;
		}
	}
}

