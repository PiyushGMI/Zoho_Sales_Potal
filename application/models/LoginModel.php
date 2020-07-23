<?php

class LoginModel extends CI_Model {

    public function checkLogin($email, $password) {
        //query the table 'users' and get the result count
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('users');

        return $query->num_rows();
    }
	public function getUserInfo($id)
    {
        $q = $this->db->get_where('users', array('user_id' => $id), 1);  
        if($this->db->affected_rows() > 0){
            $row = $q->row();
            return $row;
        }else{
            error_log('no user found getUserInfo('.$id.')');
            return false;
        }
    }
	public function getUserInfoByEmail($email)
{
$q = $this->db->get_where('users', array('email' => $email), 1);  
if($this->db->affected_rows() > 0){
$row = $q->row();
return $row;
}else{
error_log('no user found getUserInfo('.$email.')');
return false;
}
}
public function insertToken($user_id)
    {   
	  
        $token = substr(sha1(rand()), 0, 30); 
        $date = date('Y-m-d');
        
        $string = array(
                'token'=> $token,
                'user_id'=>$user_id,
                'created'=>$date
            );
        $query = $this->db->insert_string('tokens',$string);
        $this->db->query($query);
        return $token . $user_id;
        
    }
    
    public function isTokenValid($token)
    {
       $tkn = substr($token,0,30);
       $uid = substr($token,30);  
   
       
        $q = $this->db->get_where('tokens', array(
            'tokens.token' => $tkn, 
            'tokens.user_id' => $uid), 1);                         
               
        if($this->db->affected_rows() > 0){
            $row = $q->row();             
            
            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d'); 
            $todayTS = strtotime($today);
            
            if($createdTS != $todayTS){
                return false;
            }
            
            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;
            
        }else{
            return false;
        }
        
    }  
public function updatePassword($post,$password)

    {   
      $newPass = sha1($password);
	 
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('users', array('password' => $newPass)); 
        $success = $this->db->affected_rows(); 
        
        if(!$success){
            error_log('Unable to updatePassword('.$post['user_id'].')');
            return false;
        }        
        return true;
    } 
}


