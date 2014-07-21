<?php

new GET_APP_LIST();

class GET_APP_LIST{
  /** constructor **/
  function __construct(){
    //header('Content-Type: application/json');
    $this->main();
  }
  
  private function main(){  
  
    //$app_list = MODEL::get()->get_app_list();
    //print_r(json_encode($app_list));
    $url = "http://localhost/rest_mvc/api?action=get_app_list";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        $app_list = curl_exec($ch);
        //$app_list = json_decode($app_list,true);
        //print_r($app_list);
        //exit();
    FUNCTIONS::get()->view('app_list_view.php', $app_list); 
    
  } 
  
  
  /** destructor **/
  function __destruct(){
    //$this->main();  
  }
  
}
?>