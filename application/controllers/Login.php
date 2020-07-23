<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        //load the required libraries and helpers for login
        $this->load->helper('url');
        $this->load->library(['form_validation','session']);
		$this->load->library('email');
        $this->load->database();
        
        //load the Login Model
        $this->load->model('LoginModel', 'login');
    }

    public function index() {
        //check if the user is already logged in 
        $logged_in = $this->session->userdata('logged_in');
		
        if($logged_in){
            //if yes redirect to welcome page
            redirect(base_url().'welcome');
        }
        //if not load the login page
        //$this->load->view('header');
        $this->load->view('login_page');
        //$this->load->view('footer');
    }

    public function doLogin() {
		 
		 
        //get the input fields from login form
        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));
        
        //send the email pass to query if the user is present or not
        $check_login = $this->login->checkLogin($email, $password);

        //if the result is query result is 1 then valid user
        if ($check_login) {
            //if yes then set the session 'loggin_in' as true
            $this->session->set_userdata('logged_in', true);
			 $_SESSION['logged_in'] = '1';
             $_SESSION['name']=$email;
            redirect(base_url().'members/showallallcation');
			
		
        } else {
            //if no then set the session 'logged_in' as false
            $this->session->set_userdata('logged_in', false);
            
            //and redirect to login page with flashdata invalid msg
            $this->session->set_flashdata('msg', 'Username / Password Invalid');
            redirect(base_url().'login');            
        }
    }

    public function logout() {
        //unset the logged_in session and redirect to login page
        $this->session->unset_userdata('logged_in');
        redirect(base_url().'login');
    }
	
	public function forgot()
        {
            
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
            
            if($this->form_validation->run() == FALSE) {
                $this->load->view('header');
                $this->load->view('forgot');
                $this->load->view('footer');
            }else{
                $email = $this->input->post('email');  
				
                $clean = $this->security->xss_clean($email);
                $userInfo = $this->login->getUserInfoByEmail($clean);
				
				
                
                if(!$userInfo){
                    $this->session->set_flashdata('flash_message', 'We cant find your email address');
                    redirect(site_url().'login');
                }   
                
                
                
                //build token 
				
                $token = $this->login->insertToken($userInfo->user_id); 
				
			    $_SESSION['token'] = $token;
				$this->session->set_userdata($token);
	             $qstring = $this->base64url_encode($token);
                $url = site_url() . 'login/reset_passwordlink/token/' . $qstring;
                $link = '<a href="' . $url . '">' . $url . '</a>'; 
                
               
				
				$this->email->from('rahul18.kindia@gmail.com', 'Rahul');
                $this->email->to($email);
                $this->email->subject('My first email by Mailjet');
				$this->email->message('Hello from Mailjet & CodeIgniter'. $link);
                
                if($this->email->send()){
					
					var_dump('Test send');
				}
				 
                
            }
            
        }
		
		public function reset_passwordlink()
        {
			$token = $this->base64url_decode($this->uri->segment(4));     
            
            $cleanToken = $this->security->xss_clean($token);
             
            $user_info = $this->login->isTokenValid($cleanToken); //either false or array();  
             
            
            if(empty($user_info)){
                $this->session->set_flashdata('flash_message', 'Token is invalid or expired');
                redirect(site_url().'login');
            }            
            $data = array(
			    'user_id'=>$user_info->user_id,
                'name'=> $user_info->name, 
                'email'=>$user_info->email,                
                'token'=>base64_encode($token)
            );
			$this->load->view('header');
                $this->load->view('reset_password', $data);
                $this->load->view('footer');
		}
		public function reset_password()
        {
            $token = $_SESSION['token'];
			 
			 
			 
		
			 $cleanToken = $this->security->xss_clean($token);
			 
             
            $user_info = $this->login->isTokenValid($cleanToken); 
			
             
             
            if(empty($user_info)){
                $this->session->set_flashdata('flash_message', 'Token is invalid or expired');
                redirect(site_url().'login');
            }            
            $data = array(
			    'user_id'=>$user_info->user_id,
                'name'=> $user_info->name, 
                'email'=>$user_info->email,                
                'token'=>base64_encode($token)
            );
			
				 
				 $data1[] = array(
				 'user_id'=>$user_info->user_id,
                    'password' => $this->input->post('password'),
                    'passconf' => $this->input->post('passconf')
                );
				
   
                $cleanPost['password'] = $data1;
				
				
				
                $cleanPost['user_id'] = $user_info->user_id;

				
                unset($cleanPost['passconf']);  
               
                if(!$this->login->updatePassword($cleanPost,$this->input->post('password'))){
                    $this->session->set_flashdata('flash_message', 'There was a problem updating your password');
                }else{
                    $this->session->set_flashdata('flash_message', 'Your password has been updated. You may now login');
                }
                redirect(site_url().'login');                
           
        }
		public function base64url_encode($data) { 
      return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
    } 

    public function base64url_decode($data) { 
      return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
    }  
	
	 protected function _islocal(){
            return strpos($_SERVER['HTTP_HOST'], 'local');
        }
        
        public function complete()
        {                                   
            $token = base64_decode($this->uri->segment(4));       
            $cleanToken = $this->security->xss_clean($token);
            
            $user_info = $this->login->isTokenValid($cleanToken); //either false or array();           
            
            if(!$user_info){
                $this->session->set_flashdata('flash_message', 'Token is invalid or expired');
                redirect(site_url().'login');
            }            
            $data = array(
                'firstName'=> $user_info->first_name, 
                'email'=>$user_info->email, 
                'user_id'=>$user_info->id, 
                'token'=>$this->base64url_encode($token)
            );
           
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
            
            if ($this->form_validation->run() == FALSE) {   
                $this->load->view('header');
                $this->load->view('complete', $data);
                $this->load->view('footer');
            }else{
                
                $this->load->library('password');                 
                $post = $this->input->post(NULL, TRUE);
                
                $cleanPost = $this->security->xss_clean($post);
                
                $hashed = $this->password->create_hash($cleanPost['password']);    
                $cleanPost['password'] = $hashed;
                unset($cleanPost['passconf']);
                $userInfo = $this->user_model->updateUserInfo($cleanPost);
                
                if(!$userInfo){
                    $this->session->set_flashdata('flash_message', 'There was a problem updating your record');
                    redirect(site_url().'login');
                }
                
                unset($userInfo->password);
                
                foreach($userInfo as $key=>$val){
                    $this->session->set_userdata($key, $val);
                }
                redirect(site_url().'login');
                
            }
        }

}
