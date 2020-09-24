<?php 

class Cart_model extends CI_Model {

        public $user_id;
        public $product_id;
        public $quantity;
        public $status;

        public function add($data)
        {
            $this->db->insert('cart', $data);
        }

        public function get($user_id, $product_id = false)
        {
            $this->db->where('status', '1');
            $this->db->where('user_id', $user_id);
            
            if($product_id){
                $this->db->where('product_id', $product_id);
            }
            
            $query = $this->db->get('cart');
            
            if($query->num_rows() > 0){
                return $query->result_array();
            }
        }

        public function update($id, $data)
        {
            $this->db->where('id', $id);
            $this->db->where('status', '1');

            return $this->db->update('cart', $data);
        }
        
        public function delete($id = false, $user_id = false){
            
            $this->db->where('status', '1');
            
            if(!empty($user_id)){
                $this->db->where('user_id', $user_id);
            }
            if(!empty($id)){
                $this->db->where('id', $id);
            }
            
            return $this->db->update('cart', array('status' => '0'));
        }

}