<?php

namespace Utils;

class DB
{
	private $pdo;
	const DOMAIN = 'mysql:dbname=phptest;host=127.0.0.1';
	const USER = 'root';
	const PASSWORD = 'pass';

	private static $instance = null;

	private function __construct()
	{
		$this->pdo = new \PDO(self::DOMAIN, self::USER, self::PASSWORD);
	}

	public static function getInstance()
	{
		if (null === self::$instance) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}

	public function select($sql)
	{
		$sth = $this->pdo->query($sql);
		return $sth->fetchAll();
	}

	public function exec($sql)
	{
		return $this->pdo->exec($sql);
	}

	public function lastInsertId()
	{
		return $this->pdo->lastInsertId();
	}
}