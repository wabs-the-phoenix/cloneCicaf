<?php
namespace App\Core;
use PDO;
use PDOException;

class Database extends PDO
{
	private static $_instance;
	 const DB_NAME='cicafdb';
	 const DB_USER='root';
	 const DB_PASS='';
	const  DB_HOST='localhost';
	const  DB_PORT=3306;
	public function __construct()
	{
		$_dsn='mysql:dbname='.self::DB_NAME.';host='.self::DB_HOST.';port='.self::DB_PORT.'';
		try
		{
			parent::__construct($_dsn, self::DB_USER,self::DB_PASS);
			$this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
			$this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $error) {
			die($error->getMessage());
		}
	}
	public static function getInstance(){
		if (self::$_instance===null) {
			self::$_instance=new self();
		}
		return self::$_instance;
	}
}