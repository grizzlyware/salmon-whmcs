<?php

namespace Grizzlyware\Salmon\WHMCS\Helpers;

class Database
{
	public static function pdo()
	{
		return \Illuminate\Database\Capsule\Manager::connection()->getPdo();
	}

	public static function tableExists($table)
	{
		if(!preg_match('/^[a-z_]+$/i', $table)) throw new \Exception('Invalid table name to check for existence');

		try
		{
			Database::pdo()->query("SELECT 1 FROM `{$table}` LIMIT 1");
			return true;
		}
		catch(\Exception $e)
		{
			return false;
		}
	}
}



