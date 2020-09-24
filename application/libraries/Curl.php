<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH."/third_party/Requests/library/Requests.php";

class Curl{
    public function __construct() {
       Requests::register_autoloader();
    }
    
    public function simple_get($url){
        $request = Requests::get($url);
            
        if($request->status_code == 200){
            return $request->body;
        }
        else{
            return null;
        }
    }
}