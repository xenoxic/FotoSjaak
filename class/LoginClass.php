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
		$query = "SELECT * FROM `login` ";
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
	}
	public static function emailaddress_exits( $emailaddress )
	{ 
		//echo $emailaddress;exit();
		global $database;
		$query = "SELECT * FROM `login` WHERE `username` = '".$emailaddress."'";
		$result = $database->fire_query($query);
		//ternary operator
		//$var (bewering) ? "Waar" : "Niet waar"
		return ( mysql_num_rows($result) > 0 ) ? true : false;
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
	
	public static function insert_into_login($postarray)
	{
		global $database;
		//Genereer de datum
		date_default_timezone_set("Europe/Amsterdam");
		$date = date("Y-m-d H:i:s");
		//Maak een password van het email en de tijd en stop dit in een MD5-hash
		$temp_password = MD5($date.$postarray['email']); //32 tekens in Hex
		//echo $date;	
		$query = "INSERT INTO `login` ( `id`,
										`username`,
										`password`,
										`userrole`,
										`activated`,
                                        `datetime`) 
							   VALUES ( Null,
										'".$postarray['email']."', 
										'".$temp_password."',
										'customer',
										'no',
										'".$date."')";
	$database->fire_query($query);	
	//Opvragen van het id van de zojuist in de tabel login weggeschreven user.
	$query = "SELECT * FROM `login` WHERE `username` = '".$postarray['email']."'";
	$result = array_shift (self::find_by_sql($query))->id; exit();
	$query = "INSERT INTO `user` (  `id`,
									`firstname`,
									`infix`,
									`surname`,
									`address`,
									`addressnumber`,
									`city`,
									`zipcode`,
									`country`,
									`phonenumber`,
									`mobilenumber`)
						   VALUES ( '".$id."',
									'".$postarray['firstname']."',
									'".$postarray['infix']."',
									'".$postarray['surname']."',
									'".$postarray['address']."',
									'".$postarray['addressnumber']."',
									'".$postarray['city']."',
									'".$postarray['zipcode']."',
									'".$postarray['country']."',
									'".$postarray['phonenumber']."',
									'".$postarray['mobilenumber']."' )";
	$database->fire_query($query);
	}
}
?>