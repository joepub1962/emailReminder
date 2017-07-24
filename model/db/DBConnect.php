<?php
namespace model\db;

class DBConnect{
	static function getConnection(){
		//Get database conenction info from an .ini file
		$db_params = parse_ini_file("dbinfo.ini");

		$dbconnect = mysqli_connect($db_params['hostname'], $db_params['dbusr'], $db_params['dbpwrd'], $db_params['dbname']);
		if (!$dbconnect){
			throw new \Exception('Could not connect: ' . mysqli_connect_error());
		}
		// EXPLIICITY  BEGIN DB TRANSACTION
		//echo "Success!!";
		return $dbconnect;
  } //getConnect function
} //class
DBConnect::getConnection();
