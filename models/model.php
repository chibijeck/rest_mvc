<?php
/**
 * Models
 * 
 * @author Jeck N. Mabasa
 * @copyright July 11, 2014
 * @filename model.php
 * @directory models
 * @version 1.0
 * 
**/

class MODEL{
	private static $instance = NULL;
	
	/** construct **/
	private function __construct(){}
	
	/** declaring new class **/
	public static function get(){
		if (!self::$instance){
			self::$instance = new MODEL;
		}
		
		return self::$instance;
	}
		
	
	
		
}