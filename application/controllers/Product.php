<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'Api.php';

class Product extends Api {

        /*
         * @Author: Vinod Selvin
         * @Desc: Home page and it lists all products
         */
	public function index()
	{
            $this->load->library('Mybreadcrumb');
            
            $this->mybreadcrumb->add("All Products", "#");
            $data['breadcrumb'] = $this->mybreadcrumb->render();
            
            //get products list
            $data['products'] = $this->getProduct();
            $data['filter']['categories'] = $this->getCategories($data['products']);
            $this->load->view('product/product-list', $data);
	}
        
        public function getCategories($products){
            foreach($products as $product){
                if(empty($categories[$product['category']])){
                    $categories[$product['category']] = ucwords($product['category']);
                }
            }
            
            return $categories;
        }
        
        /*
         * @Author: Vinod Selvin
         * @Desc: Product details Section
         */
        public function productDetails($category, $product_id){
            
            $this->load->library('Mybreadcrumb');
            
            $data = $this->getProduct($product_id);
            
            //for breadcrumb
            $uri_segments = $this->uri->segments;
            
            //remove last element as it is id
            array_pop($uri_segments);
            
            $this->mybreadcrumb->generateFromUrl($uri_segments);
            
            $data['category_processed'] = removeSpaceToHypen($data['category']);
            
            //add active element as product name
            $this->mybreadcrumb->add($data['title'], "#");
            
            $data['breadcrumb'] = $this->mybreadcrumb->render();

            $this->load->view('product/product-details', $data);
        }
        
        /*
         * @Author: Vinod Selvin
         * @Desc: List all Products in a category
         */
        public function productsByCategory($category){
            
            $category = strtolower(removeHypenToSpace($category));
            
            $this->mybreadcrumb->generateFromUrl($this->uri->segments);
            
            $data['products'] = $this->getProductsByCategory($category);
//            $data['categories'][] = ucwords($category);
            $data['breadcrumb'] = $this->mybreadcrumb->render();
            
            $this->load->view('product/product-list', $data);
        }
}
