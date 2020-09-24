<?php 

class Auth_model extends CI_Model {

    
        public function verifyLoginRegister($data){
            
            $username = $data['username'];
            $password = $data['password'];
            
            $status = $this->get($username, $password);
            
            $resp = false;
            
            //if user present
            if($status){
                $resp['error'] = false;
                $resp['id'] = $status['user_id'];
            }
            else{
                $status = $this->get($username);
                
                if($status){
                    $resp['error'] = true;
                    $resp['id'] = $status['user_id'];
                }
                else{
                    $resp['error'] = false;
                    
                    $resp['id'] = $this->add($data);
                }
            }
            
            return $resp;
        }
        
        public function add($data)
        {
            $this->db->insert('users', $data);
            
            return $this->db->insert_id();
        }

        public function get($username, $password = false)
        {
            $this->db->where('status', '1');
            $this->db->where('username', $username);
            
            if($password){
                $this->db->where('password', $password);
            }
            
            $query = $this->db->get('users');
            
            if($query->num_rows() > 0){
                return $query->result_array()[0];
            }
            
            return false;
        }

        public function update($id, $data)
        {
            $this->db->where('id', $id);
            $this->db->where('status', '1');

            return $this->db->update('cart', $data);
        }
        
        public function delete(){
            
        }

}