<?php

namespace Grizzlyware\Salmon\WHMCS;

use Grizzlyware\Salmon\WHMCS\CustomField\CustomFieldValue;
use Grizzlyware\Salmon\WHMCS\Product\Product;

class CustomField extends \WHMCS\CustomField
{
	public function product()
	{
		return $this->hasOne(Product::class, "id", "relid");
	}

	public function customFieldValues()
	{
		return $this->hasMany(CustomFieldValue::class, "fieldid");
	}
}

