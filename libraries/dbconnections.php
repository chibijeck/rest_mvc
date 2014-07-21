<?php

/**
 * Database Connection
 * 
 * @author Jeck N. Mabasa
 * @copyright July 11, 2014
 * @filename dbconnections.php
 * @directory library
 * @version 1.0
 * 
**/

$host = CONSTANTS::DBHOST;
$user = CONSTANTS::DBUSER;
$pass = CONSTANTS::DBPASS;
$api = CONSTANTS::DBREST;

DB_CONNECTION::get()->connect($host,$user,$pass);
DB_CONNECTION::get()->select_db($api);

class DB_CONNECTION{
	private $host;
	private $user;
	private $pass;
	private $database;
	private static $instance = NULL;
	
	/** construct **/
	private function __construct(){}
	
	/** declaring new class **/
	public static function get(){
		if (!self::$instance){
			self::$instance = new DB_CONNECTION;
		}
		
		return self::$instance;
	}
	
	/** database connection **/
	public function connect($host, $user, $pass){
		$this->connection =  mysql_connect($host, $user, $pass) or die("Cannot create connection.");		
	}
	
	/** selecting database name **/
	public function select_db($database){
		$this->db = mysql_select_db($database) or die ("Cannot connect to database.");	
	}
	
	/** mysql query **/
	private function query($que){
		$this->result = mysql_query($que) or die(mysql_error().". Cannot run query. ".$que);
	}
	
	/** select query **/
	public function select($table, $fields, $condition = false, $addon = false){
		$que = "SELECT $fields FROM $table";
		if(!empty($condition)){
			$que .= " WHERE $condition";
		}
		
		if(!empty($addon)){
			$que .= " $addon";
		}
		$this->query($que);
		$this->total = mysql_num_rows($this->result);	
	}
	
	/** insert query **/
	public function insert($table,$fields,$data){	
		$que = "INSERT INTO $table($fields)VALUES($data)";
		$this->query($que);
		return mysql_insert_id();
	}
	
	/** update query **/
	public function update($table,$data,$condition = false){
		$que = "UPDATE $table SET $data";						
		if(!empty($condition)){
			$que .= " WHERE $condition";
		}
		$this->query($que);				
	}
	
	/** delete query **/
	public function delete($table,$condition = false){
		$que = "DELETE FROM $table";						
		if(!empty($condition)){
			$que .= " WHERE $condition";
		}
		$this->query($que);
                
	}
	
	/** get total counts **/
	public function get_counts(){ 
		return $this->total; 
	}
	
	/** get the query data **/
	public function get_data(){
		/*$row = array();
		while($rowOut = mysql_fetch_array($data)){
			$row[] = $rowOut;	
		}
		
		return $row;*/
		if($this->total){
			if($this->total > 1){
				$row = array();
				while($rowOut = mysql_fetch_assoc($this->result)){
					$row[] = $rowOut;	
				}	
			}else{	
				$row = mysql_fetch_assoc($this->result);	
			}
			
  			return $row;
  		}else{
			return 0;
		}
	}
	
	/** get the query data **/
	public function get_data2($data){
		$row = array();
		while($rowOut = mysql_fetch_array($data)){
			$row[] = $rowOut;	
		}
		
		return $row;
	}
		
	/** close db connection **/
	public function close(){ 
		mysql_close($this->connection);	
	}
	
	/** destruct **/
	public function __destruct(){
		$this->close();	
	}
}