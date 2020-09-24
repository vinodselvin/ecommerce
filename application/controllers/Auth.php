<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'Cart.php';
//require_once 'Api.php';

class Auth extends Cart {

        /*
         * @Author: Vinod Selvin
         * @Desc: Home page and it lists all products
         */
	public function loginSignup()
	{
            
            $post = $this->input->post();
            
            $post['password'] = md5($post['password']);
            
            $cart = $post['cart'];
            
            unset($post['cart']);
            
            $this->load->model('auth_model');
            
            $resp = $this->auth_model->verifyLoginRegister($post);
            
            if($resp['error'] == true){
                $resp['message'] = "Invalid Username or Password";
            }
            else{
                $this->session->set_userdata('user_id', $resp['id']);
                
                setcookie("loggedIn", "1", time() + (86400 * 30) * 365, "/");
                
//                $cart_controller = new Cart();
                if(!empty($cart)){
                    
                    $cart = json_decode($cart, true);
                    
                    foreach($cart as $key => $e_cart){
                        $this->_addNewProduct($e_cart['productId'], $e_cart['quantity'], $this->session->user_id);
                    }
                }
            }
            
            echo json_encode($resp);
	}
        
        public function logout(){
            session_destroy();
        }
}
