<?php
require_once('config/config.php');
//Dit is de class definite van de MySqlDatabase class
class MySqlDatabaseClass
{
	//Fields
	private $db_connection;

	//Dit is de constructor van de class
	public function __construct()
	{
		$this->db_connection = mysql_connect(SERVERNAME, USERNAME, PASSWORD) 
			or die('MySqlDatabaseClass'.mysql_error());
		//select een database
		mysql_select_db(DATABASE, $this->db_connection ) 
			or die('MySqlDatabaseClass'.mysql_error());
	}
	
	//methode om query's naar de database te sturen
	public function fire_query( $query )
	{
		//styyr de query naar de database op de geselecteerde mysql-server.
		$result = mysql_query( $query, $this->db_connection ) 
			or die ('MySqlDatabaseClass: '.mysql_error());
		//aks een query een recource teruggeeft, geeft deze als return waarde terug.
		return $result;
		
	}
}
//maak nyu een instantie van de MySqlDatabaseClass class.
$database = new MySqlDatabaseClass();
?>