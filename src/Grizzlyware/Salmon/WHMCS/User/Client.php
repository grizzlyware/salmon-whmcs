<?php

namespace Grizzlyware\Salmon\WHMCS\User;

use Grizzlyware\Salmon\WHMCS\Billing\Currency;
use Grizzlyware\Salmon\WHMCS\Billing\Invoice;
use Grizzlyware\Salmon\WHMCS\CustomField\CustomFieldStore;
use Grizzlyware\Salmon\WHMCS\Domain\Domain;
use Grizzlyware\Salmon\WHMCS\Service\Service;
use Grizzlyware\Salmon\WHMCS\User\Client\Affiliate;
use Grizzlyware\Salmon\WHMCS\User\Client\Contact;
use Grizzlyware\Salmon\WHMCS\User\Client\Group;
use Grizzlyware\Salmon\WHMCS\User\Traits\CanBeLabelled;

/**
 * @property-read string $email
 * @property-read int $id
 * @method static self findOrFail(int $id)
 * @method static self|null find(int $id)
 * @property string $companyname
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $postcode
 * @property string $country
 * @property string $phonenumber
 * @property string $firstname
 * @property string $lastname
 * @property string $defaultgateway
 */
class Client extends \WHMCS\User\Client
{
	use CanBeLabelled;

	protected $customFieldStore;

	public function affiliate()
	{
		return $this->hasOne(Affiliate::class, 'clientid');
	}

	public function contacts()
	{
		return $this->hasMany(Contact::class, 'userid');
	}

	public function invoices()
	{
		return $this->hasMany(Invoice::class, 'userid');
	}

	public function domains()
	{
		return $this->hasMany(Domain::class, 'userid');
	}

	public function services()
	{
		return $this->hasMany(Service::class, 'userid');
	}

	public function log($message)
	{
		\logActivity($message, $this->id);
	}

	public function group()
	{
		return $this->belongsTo(Group::class, 'groupid');
	}

	public function currency()
	{
		return $this->belongsTo(Currency::class, 'currencyid');
	}

	public function customFieldStore()
	{
		if(!$this->customFieldStore) $this->customFieldStore = new CustomFieldStore($this);
		return $this->customFieldStore;
	}
}


