<?php

namespace Grizzlyware\Salmon\WHMCS\Product\ConfigurableOptions\Group;

use Grizzlyware\Salmon\WHMCS\Product\ConfigurableOptions\Group;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
	protected $table = "tblproductconfigoptions";
	public $timestamps = false;
	protected $casts = ['hidden' => 'boolean'];

	const TYPE_ENUM = 'TYPE_ENUM';
	const TYPE_BOOLEAN = 'TYPE_BOOLEAN';
	const TYPE_QUANTITY = 'TYPE_QUANTITY';

	const TYPE_DISPLAY_DROPDOWN = 'TYPE_DISPLAY_DROPDOWN';
	const TYPE_DISPLAY_RADIO = 'TYPE_DISPLAY_RADIO';
	const TYPE_DISPLAY_BOOLEAN = 'TYPE_DISPLAY_BOOLEAN';
	const TYPE_DISPLAY_QUANTITY = 'TYPE_DISPLAY_QUANTITY';

	public function scopeGenericIdentifier($query, $input)
	{
		if(is_numeric($input))
		{
			$query->where('tblproductconfigoptions.id', $input);
		}
		else
		{
			$query->where('tblproductconfigoptions.optionname', 'LIKE', $input);
		}
	}

	public function group()
	{
		return $this->belongsTo(Group::class, 'gid');
	}

	public function subOptions()
	{
		return $this->hasMany(Group\Option\SubOption::class, 'configid');
	}

	public function getTypeAttribute()
	{
		switch($this->attributes['optiontype'])
		{
			case 1:
			case 2:
				return self::TYPE_ENUM;

			case 3:
				return self::TYPE_BOOLEAN;

			case 4:
				return self::TYPE_QUANTITY;

			default:
				throw new \Exception('Invalid option type encountered');
		}
	}

	public function getDisplayTypeAttribute()
	{
		switch($this->attributes['optiontype'])
		{
			case 1:
				return self::TYPE_DISPLAY_DROPDOWN;

			case 2:
				return self::TYPE_DISPLAY_RADIO;

			case 3:
				return self::TYPE_DISPLAY_BOOLEAN;

			case 4:
				return self::TYPE_DISPLAY_QUANTITY;

			default:
				throw new \Exception('Invalid option type encountered');
		}
	}
}

