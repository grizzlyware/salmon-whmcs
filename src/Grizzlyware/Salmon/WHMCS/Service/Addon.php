<?php

namespace Grizzlyware\Salmon\WHMCS\Service;

use Grizzlyware\Salmon\WHMCS\CustomField\CustomFieldStore;

/**
 * @property-read int $id
 * @property int|null $addonid
 */
class Addon extends \WHMCS\Service\Addon
{
	protected $customFieldStore;

	public function customFieldStore()
	{
		if(!$this->customFieldStore) {
			$this->customFieldStore = new CustomFieldStore($this);
		}

		return $this->customFieldStore;
	}
}

