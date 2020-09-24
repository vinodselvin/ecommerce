<?php 

class User_model extends CI_Model {

        public function get($user_id)
        {
            $this->db->where('status', '1');
            $this->db->where('user_id', $user_id);
            
            $query = $this->db->get('users');
            
            if($query->num_rows() > 0){
                return $query->row_array();
            }
        }
        
        public function update($data)
        {
            $this->db->where('status', '1');
            $this->db->where('user_id', $data['user_id']);
            
            return $this->db->update('users', $data);
        }


}