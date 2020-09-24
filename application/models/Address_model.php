<?php 

class Address_model extends CI_Model {

        public function get($user_id)
        {
            $this->db->where('status', '1');
            $this->db->where('user_id', $user_id);
            
            $query = $this->db->get('address');
            
            if($query->num_rows() > 0){
                return $query->row_array();
            }
        }
        
        public function replace($data){
            $exists = $this->get($data['user_id']);
            
            if($exists){
                $this->update($data);
            }
            else{
                $this->insert($data);
            }
        }
        
        public function update($data)
        {
            $this->db->where('status', '1');
            $this->db->where('user_id', $data['user_id']);
            
            return $this->db->update('address', $data);
        }
        
        public function insert($data)
        {
            return $this->db->insert('address', $data);
        }


}