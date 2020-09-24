<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
        
        public function getProduct($id = ""){
            
            $this->load->library("Curl");
            
            $json = $this->curl->simple_get(PRODUCTS_API."/".$id);
            
            if($json){
                return json_decode($json, true);
            }
            
            return $json;
        }
        
        public function getProductsByCategory($category){
            
            $this->load->library("Curl");
            
            $json = $this->curl->simple_get(CATEGORY_API."/".$category);
            
            if($json){
                return json_decode($json, true);
            }
            
            return $json;
        }
        
}
