<?php
/**
 * Specific Functions
 * 
 * @author Jeck N. Mabasa
 * @copyright July 11, 2014
 * @filename functions.php
 * @directory libraries
 * @version 1.0
 * 
**/

class FUNCTIONS{
		
	private static $instance = NULL;
	
	/** construct **/
	private function __construct(){}
	
	/** declaring new class **/
	public static function get(){
		if (!self::$instance){
			self::$instance = new FUNCTIONS;
		}
		
		return self::$instance;
	}
	
	/** get controller **/
	public function controller($file,$data = false){		
		require_once dirname(dirname(__FILE__)).'/controllers/'.$file;
	}
	
	/** get views **/
	public function view($file,$data = false){
		if($data == true){
			if(!is_array($data)){
				$data = $data;	
			}
		}
		require_once dirname(dirname(__FILE__)).'/views/'.$file;
	}
	
	/** get models **/
	public function model($file,$data = false){
		require_once dirname(dirname(__FILE__)).'/models/'.$file;
	}
}

?>