<?php

namespace Grizzlyware\Salmon\WHMCS\CustomField;

use Grizzlyware\Salmon\WHMCS\CustomField;
use Grizzlyware\Salmon\WHMCS\Service\Addon;
use Grizzlyware\Salmon\WHMCS\Service\Service;
use Grizzlyware\Salmon\WHMCS\User\Client;

class CustomFieldValue extends \WHMCS\CustomField\CustomFieldValue
{
	public function scopeFieldId($query, $fieldId)
	{
		$query->where('fieldid', $fieldId);
	}

	public function scopeRelId($query, $relId)
	{
		$query->where('relid', $relId);
	}

	public function customField()
	{
		return $this->belongsTo(CustomField::class, "fieldid");
	}

	public function client()
	{
		return $this->belongsTo(Client::class, "relid");
	}

	public function service()
	{
		return $this->belongsTo(Service::class, "relid");
	}

	public function getValueAttribute()
	{
		// case 'dropdown': case 'text': case 'link': case 'password': case 'textarea':

		switch($this->customField->fieldtype)
		{
			case 'tickbox':
				return !!$this->attributes['value'];

			default:
				return $this->attributes['value'];
		}
	}
}

