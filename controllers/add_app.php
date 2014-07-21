<?php
/** temporary add this call class here; transfer this to config once done. **/
new ADD_APP();

class ADD_APP{
	/** constructor **/
	function __construct(){
		//header('Content-Type: application/json');
		$this->main();
	}
	
	private function main(){	
            //$app_info = array();

			//$get_id = MODEL::get()->get_app_by_id($_GET["id"]);
			//print_r($get_id);
		FUNCTIONS::get()->view('add_app_view.php');
		
		if(isset($_POST["submit"])){
			$name = $_POST["name"];
			$price = $_POST["price"];
			$version = $_POST["version"];

         	$this->post($name,$price,$version); 
    	}
		
	}

	private function post($name,$price,$version){
		  $url = "http://localhost/rest_mvc/api";
          $curl = curl_init($url);
          $curl_post_data = array(
              "name" => $name,
              "price" => $price,
              "version" => $version
          );
          //print_r($curl_post_data);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
          $curl_response = curl_exec($curl);
          echo $curl_response;
          curl_close($curl);
	}	
	
	
	/** destructor **/
	function __destruct(){
		//$this->main();	
	}
	
}
?>