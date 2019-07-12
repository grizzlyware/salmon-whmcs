<?php

namespace Grizzlyware\Salmon\WHMCS\Product\ConfigurableOptions;

use Grizzlyware\Salmon\WHMCS\Product\ConfigurableOptions\Group\Option;
use Grizzlyware\Salmon\WHMCS\Product\Product;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	protected $table = "tblproductconfiggroups";
	public $timestamps = false;

	public function products()
	{
		return $this->belongsToMany(Product::class, 'tblproductconfiglinks', 'gid', 'pid');
	}

	public function options()
	{
		return $this->hasMany(Option::class, 'gid');
	}

	public function scopeGenericIdentifier($query, $input)
	{
		if(is_numeric($input))
		{
			$query->where('tblproductconfiggroups.id', $input);
		}
		else
		{
			$query->where('tblproductconfiggroups.name', 'LIKE', $input);
		}
	}
}


