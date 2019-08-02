<?php

namespace Grizzlyware\Salmon\WHMCS\Helpers;

use Grizzlyware\Salmon\WHMCS\Helpers\Database as DatabaseHelper;
use Grizzlyware\Salmon\WHMCS\Helpers\DataStore\Item;
use WHMCS\Database\Capsule;
use Illuminate\Database\Schema\Blueprint;

class DataStore
{
	const EMPTY_VALUE_INDEX = 'WHMCS_SALMON_EMPTY_DATASTORE_VALUE_INDEX';

	public static function get($relType, $relId, $key)
	{
		$item = self::getModel($relType, $relId, $key);
		if(!$item) return null;
		return $item->value;
	}

	public static function getModel($relType, $relId, $key)
	{
		self::ensureItemsTableExists();
		return Item::relType($relType)->relId($relId)->key($key)->first();
	}

	public static function set($relType, $relId, $key, $value, $valueIndex = self::EMPTY_VALUE_INDEX)
	{
		$item = self::getModel($relType, $relId, $key);

		if(!$item)
		{
			$item = new Item();
			$item->rel_type = $relType;
			$item->rel_id = $relId;
			$item->key = $key;
		}

		$item->value = $value;
		if($valueIndex != self::EMPTY_VALUE_INDEX) $item->value_index = $valueIndex;
		$item->save();
	}

	protected static function itemsTableExists()
	{
		return DatabaseHelper::tableExists('mod_salmon_data_store_items');
	}

	protected static function ensureItemsTableExists()
	{
		if(self::itemsTableExists()) return;

		// Create the table
		Capsule::schema()->create('mod_salmon_data_store_items', function (Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string('rel_type')->index();
			$table->unsignedBigInteger('rel_id')->index();
			$table->string('key')->index();
			$table->longText('value');
			$table->string('value_index')->nullable()->index();
			$table->timestamps();
		});
	}
}



