<?php

namespace Grizzlyware\Salmon\WHMCS\Product;

use Grizzlyware\Salmon\WHMCS\Product\ConfigurableOptions\Group as ConfigurableOptionGroup;

class Product extends \WHMCS\Product\Product
{
	public function configurableOptionGroups()
	{
		return $this->belongsToMany(ConfigurableOptionGroup::class, 'tblproductconfiglinks', 'pid', 'gid');
	}
}


