<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'Api.php';

class Cart extends Api {

        /*
         * @Author: Vinod Selvin
         * @Desc: Home page and it lists all products
         */
	public function index()
	{
            
            $user_id = $this->session->user_id;
            
            if($user_id){

                //get products list
                $data['cart_product'] = $this->getCartProductsByUser($user_id);
                $data['details'] = $this->getUserDetails();
                $this->js[] = base_url('assets/js/cart.js');

                $this->load->view('cart/cart-list', $data);
            }
            else{
                $this->js[] = base_url('assets/js/login.js');
                $this->css[] = base_url('assets/css/login.css');
                $this->load->view('auth/login');
            }
	}
        
        function getCartProductsByUser($user_id){
            
            $cart = $this->_getCartByUser($user_id);
            
            $product = $this->getProduct();
            
            foreach($product as $e_product){
                $product_map[$e_product['id']] = $e_product;
            }
            
            foreach($cart as $key => $e_cart){
                $cart_product[$key] = $e_cart;
                $cart_product[$key]['details'] = $product_map[$e_cart['productId']];
            }
            
            return $cart_product;
        }
        
        public function getCartBySessionUser(){
            
            $this->load->model('cart_model');
            
            $user_id = $this->session->user_id;
            
            $resp = $this->_getCartByUser($user_id);
            
            echo json_encode($resp);
        }
        
        public function _getCartByUser($user_id){
            
            $this->load->model('cart_model');
            $resp = false;
            
            if($user_id){
                $cart_data = $this->cart_model->get($user_id);
                
                foreach($cart_data as $key => $e_data){
                    
                    $prev_quantity = $resp[$e_data]['product_id']['quantity'];
                    
                    $resp[$e_data['product_id']] = array('productId' => $e_data['product_id'], 'quantity' => $prev_quantity+$e_data['quantity'], cartId => $e_data['id']);
                }
                
            }
            
            return $resp;
        }
        
        public function addNewProduct(){
            
            $product_id = $this->input->post('productId');
            $quantity = $this->input->post('quantity');
            
            $this->load->model('cart_model');
            
            $user_id = $this->session->user_id;
            
            $this->_addNewProduct($product_id, $quantity, $user_id);
            
            echo json_encode("success");
        }
        
        public function _addNewProduct($product_id, $quantity, $user_id){
            $this->load->model('cart_model');
            
            $resp = false;
            
            if($user_id){
                $cart_data = $this->cart_model->get($user_id, $product_id);
                
                if(!empty($cart_data)){
                    
                    $cart_data = $cart_data[0];
                    
                    $cart_data['quantity'] += $quantity;
                    
                    $this->cart_model->update($cart_data['id'], $cart_data);
                }
                else{
                    $cart_data = array(
                        'product_id' => $product_id,
                        'user_id' => $user_id,
                        'quantity' => $quantity,
                        'status' => '1',
                    );
                    $this->cart_model->add($cart_data);
                }
                
            }
            
            return true;
        }
       
        
        public function removeItemFromCart(){
            
            $this->load->model('cart_model');
            $cart_id = $this->input->post('cart_id');
            
            $user_id = $this->session->user_id;
            
            if($user_id){
                $this->cart_model->delete($cart_id, $user_id);
                
                $status = "success";
            }
            else{
                $status = "failure";
            }
            
            echo json_encode($status);
        }
        
        public function getUserDetails(){
            $this->load->model('user_model');
            $this->load->model('address_model');
            $user_id = $this->session->user_id;
            
            $data['user'] = $this->user_model->get($user_id);
            $data['address'] = $this->address_model->get($user_id);
            
            return $data;
        }
        
        public function payOrder(){
            $this->load->model('user_model');
            $this->load->model('address_model');
            $this->load->model('cart_model');
            
            $user = $this->input->post('user');
            $user['user_id'] = $this->session->user_id;
            
            $address = $this->input->post('address');
            $address['user_id'] = $this->session->user_id;
            
            $this->user_model->update($user);
            $this->address_model->replace($address);
            $this->cart_model->delete(false, $user['user_id']);
            
            echo json_encode(array("url" => base_url('success')));
        }
        
        public function successPage(){
            
            $this->load->model('user_model');
            
            $this->load->view('success/confirm-order');
            
        }
}
