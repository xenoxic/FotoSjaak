<?php
require_once("MySqlDatabaseClass.php");

class LoginClass
{
	//Fields
	private $id;
	private $username;
	private $password;
	private $userrole;
	private $activated;
	
	//Properties
	
	//Consturctor
	public function __construction()
	{
		
	}
	
	public static function find_by_sql( $query )
	{
		global $database;
		$result = $database->fire_query( $query );
		$object_array = array();
		while ( $row = mysql_fetch_object( $result ) )
		{
			$object = new LoginClass();
			$object->id = $row->id;
			$object->username = $row->username;
			$object->password = $row->password;
			$object->userrole = $row->userrole;
			$object->activated = $row->activated;
			$object_array[] = $object;
		}
		return $object_array;
	}
	
	public static function find_all()
	{
		$quesry = "SELECT * FROM `login` ";
		$result = self::find_by_sql($query);
		$output = '';
		foreach ( $result as $value )
	{
		$output .=	  $value->id." | 
					".$value->username." |
					".$value->password." |
					".$value->userrole." |
					".$value->activated." | ".
					"<br />";
	}
	return $output;
	
	public static function e-mail_exists( $emailaddress )
	{ 
		//echo $emailaddress;exit();
		global $database;
		$query = "SELECT * FROM `login` WHERE `username` = '".$emailaddress."'";
		$result = $database->fire_query($query);
		//ternary operator
		//$var (bewering) ? "Waar" : "Niet waar"
		return mysql_num_rows($result) > 0 ) ? true : false;
	/*	if ( mysql_num_rows($result) > 0 ) 
		{
			return true;
		} 
		else
		{ 
			return false;
		}
	*/
		//echo $query
 	}
}
?>