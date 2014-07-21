<?php
/** temporary add this call class here; transfer this to config once done. **/
new GET_APP_BY_ID();

class GET_APP_BY_ID{
	/** constructor **/
	function __construct(){
		//header('Content-Type: application/json');
		$this->main();
	}
	
	private function main(){	
        $url = "http://localhost/rest_mvc/api?action=get_app&id=" . $_GET['id'];
		  $ch = curl_init();
		  curl_setopt($ch, CURLOPT_URL, $url);
		  curl_setopt($ch, CURLOPT_FAILONERROR, 1);
		  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		  curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		  $app_info = curl_exec($ch);
		FUNCTIONS::get()->view('app_by_id_view.php', $app_info);

		if(isset($_POST["update"])){
			$id = $_POST["id"];
            $name = $_POST["name"];
            $price = $_POST["price"];
            $version = $_POST["version"];
        	$this->put($id,$name,$price,$version);
    	}

    	if(isset($_POST["delete"])){
    		$id = $_POST["id"];
      		$this->delete($id);
    	}
		
	}	
	
	private function put($id,$name,$price,$version){
		$data = array(
              "id" => $id,
              "name" => $name,
              "price" => $price,
              "version" => $version
          );

          $put_url = "http://localhost/rest_mvc/api?".http_build_query($data);
          $ch_url = curl_init($put_url);
          curl_setopt($ch_url, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch_url, CURLOPT_CUSTOMREQUEST, 'PUT');
          curl_setopt($ch_url, CURLOPT_HEADER, false);
          curl_setopt($ch_url, CURLOPT_HTTPHEADER, array('Accept: application/json'));
          $response = curl_exec($ch_url);
          echo $response;
          curl_close($ch_url);
	}

	private function delete($id){
		$data = array("id" => $id);
	      $url = "http://localhost/rest_mvc/api?".http_build_query($data);
	      $ch = curl_init($url);
	      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
	      curl_setopt($ch, CURLOPT_HEADER, false);
	      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	      $response = curl_exec($ch);
	      echo $response;
	      curl_close($ch);
	}
	
	/** destructor **/
	function __destruct(){
		//$this->main();	
	}
	
}
?>