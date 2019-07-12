<?php

namespace Grizzlyware\Salmon\WHMCS\Product\ConfigurableOptions\Group\Option;

use Grizzlyware\Salmon\WHMCS\Product\ConfigurableOptions\Group\Option;
use Illuminate\Database\Eloquent\Model;

class SubOption extends Model
{
	protected $table = "tblproductconfigoptionssub";
	public $timestamps = false;
	protected $casts = ['hidden' => 'boolean'];

	public function option()
	{
		return $this->belongsTo(Option::class, 'configid');
	}
}


