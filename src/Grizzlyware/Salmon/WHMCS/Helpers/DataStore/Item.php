<?php

namespace Grizzlyware\Salmon\WHMCS\Helpers\DataStore;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	protected $table = 'mod_salmon_data_store_items';

	public function scopeRelType($query, $type)
	{
		$query->where('rel_type', $type);
	}

	public function scopeRelId($query, $relId)
	{
		$query->where('rel_id', $relId);
	}

	public function scopeKey($query, $key)
	{
		$query->where('key', $key);
	}

	public function getValueAttribute()
	{
		return unserialize($this->attributes['value']);
	}

	public function setValueAttribute($value)
	{
		$this->attributes['value'] = serialize($value);
	}
}

