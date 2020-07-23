<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        // Load member model
        $this->load->model('member');
        
        // Load form helper and library
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->library('email');
        
        // Load pagination library
        $this->load->library('pagination');
        
        // Per page limit
        $this->perPage = 50;
    }
function getpreid(){
	
	$newcat=$_POST["cat"];
$regionid=$_POST["reginid"];
$trimregion= trim($regionid,",");


$prevuser = $this->member->search_pre_user($newcat,$trimregion);




if(!empty($prevuser)){

    $prevuser1= $prevuser[0]['sales_per_name'];

echo $prevuser1;
}else{

echo "Not found";
}	
	
	
	
	
}


    function tbldata(){


            //check if the user is already logged in 
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in){
            //if yes redirect to welcome page
        
        if(empty($_POST["name_id"])){

             redirect(base_url().'login'); 

        }
         
        $name_array = $_POST["name_id"];
		
        $cat_array=$_POST["cat"];
		
        $region_array =$_POST["region_id"];
		
		


        $name = $_POST["name"];
        $cat=$_POST["cat"];
        $region =$_POST["region"];
        $email = $_SESSION['name']; 
       // var_dump($email);
       //exit;		
      
      for($i=0; $i<count($name_array);$i++){

         $batch=array('saleteam_id'=>$name_array[$i]);
		 
		 

         $rowsCount = $this->member->update_zoho_lead($batch, $cat_array[$i], $region_array[$i]);

          //get updated

          $data_r[] = array('sales_name'=>$name[$i],'cat'=>$cat[$i],'region'=>$region[$i],'action'=>$rowsCount);

       
      }
       
				

        $data['succes_array']=$data_r;
		
			$this->email->from('rahul18.kindia@gmail.com', 'Rahul');
                $this->email->to($email);
				$this->email->cc('p.1ghatole@gmail.com');
                $this->email->subject('Zoho Allocation Updated Successfully');
				$this->email->message('Hello' .  $email);
               $body = $this->load->view('members/sendmail.php',$data,TRUE);
               $this->email->message($body); 
			   
                if($this->email->send()){
					
					//var_dump('Test send');
				}
		
		
		
		

         // Load the list page view
        //$this->load->view('templates/header', $data);
        $this->load->view('members/zoho_sucess', $data);
       // $this->load->view('templates/footer');
            
        }else{


           redirect(base_url().'login'); 
        }

        //var_dump( $data_r);
    }
	
	
	
	
	
	function tbldata1(){


            //check if the user is already logged in 
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in){
            //if yes redirect to welcome page
        
        if(empty($_POST["name_id"])){

             redirect(base_url().'login'); 

        }
         
        $name_array = $_POST["name_id"];
		
        $cat_array=$_POST["cat"];
		
        $region_array =$_POST["region_id"];
		
		


        $name = $_POST["name"];
        $cat=$_POST["cat"];
        $region =$_POST["region"];
        $email = $_SESSION['name']; 
       // var_dump($email);
       //exit;		
      
      for($i=0; $i<count($name_array);$i++){

         $batch=array('saleteam_id'=>$name_array[$i]);
		 
		 

         // $rowsCount = $this->member->update_zoho_lead($batch, $cat_array[$i], $region_array[$i]);

          //get updated

          $data_r[] = array('sales_name'=>$name[$i],'cat'=>$cat[$i],'region'=>$updreg[$i],'action'=>$rowsCount);

       
      }
       
				

        $data['succes_array']=$data_r;
		
		
		
		$this->email->from('rahul18.kindia@gmail.com', 'Rahul');
                $this->email->to($email);
				//$this->email->cc('p.1ghatole@gmail.com');
                $this->email->subject('Zoho Allocation Updated Successfully');
				$this->email->message('Hello' .  $email);
               $body = $this->load->view('members/sendmail.php',$data,TRUE);
               $this->email->message($body); 
			   
                if($this->email->send()){
					
					//var_dump('Test send');
				}

         // Load the list page view
        //$this->load->view('templates/header', $data);
        $this->load->view('members/zoho_sucess', $data);
       // $this->load->view('templates/footer');
            
        }else{


           redirect(base_url().'login'); 
        }

        //var_dump( $data_r);
    }
    public function showallallcation(){

          //check if the user is already logged in 
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in){
            //if yes redirect to welcome page

            $data = array();
        $id = $this->input->get('sales_id');
        $memData1= $this->member->getall();;
        $data['memberdata'] = $memData1;
        // Load the list page view
        //$this->load->view('templates/header', $data);
        $this->load->view('members/showallallcation', $data);
        //$this->load->view('templates/footer');
            
        }else{


           redirect(base_url().'login'); 
        }
        
 
		
		
	}    public function index(){
		

        $data = array();
        
        // Get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        
        // If search request submitted
        if($this->input->post('submitSearch')){
            $inputKeywords = $this->input->post('searchKeyword');
            $searchKeyword = strip_tags($inputKeywords);
            if(!empty($searchKeyword)){
                $this->session->set_userdata('searchKeyword',$searchKeyword);
            }else{
                $this->session->unset_userdata('searchKeyword');
            }
        }elseif($this->input->post('submitSearchReset')){
            $this->session->unset_userdata('searchKeyword');
        }
        $data['searchKeyword'] = $this->session->userdata('searchKeyword');
        
        // Get rows count
        $conditions['searchKeyword'] = $data['searchKeyword'];
        $conditions['returnType']    = 'count';
        $rowsCount = $this->member->getRows($conditions);
        
        // Pagination config
        $config['base_url']    = base_url().'members/index/';
        $config['uri_segment'] = 3;
        $config['total_rows']  = $rowsCount;
        $config['per_page']    = $this->perPage;
        
        // Initialize pagination library
        $this->pagination->initialize($config);
        
        // Define offset
        $page = $this->uri->segment(3);
        $offset = !$page?0:$page;
        
        // Get rows
        $conditions['returnType'] = '';
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        $data['members'] = $this->member->getRows($conditions);

       // modify by uttareshwar
        $data['region'] = $this->member->getregion();
       //end here
        $data['title'] = 'Members List';
        
        // Load the list page view
       // $this->load->view('templates/header', $data);
        $this->load->view('members/index', $data);
       // $this->load->view('templates/footer');
    }

    public function view($id){
        $data = array();
		//$this->session->set_userdata('error_msg', 'Some problems occured, please try again.');
        
        // Check whether member id is not empty
        if(!empty($id)){
           $data['member'] = $this->member->getRows(array('sales_id' => $id));;
			$data['member1']= $this->member->getall($id);;
			$data['member2']= $this->member->getcont($id);;
			//var_dump($member2);
			//exit;
            $data['title']  = 'Sales Member Details';
            
            // Load the details page view
            $this->load->view('templates/header', $data);
            $this->load->view('members/view', $data);
            $this->load->view('templates/footer');
        }else{
			
            redirect('members');
        }
		$this->session->set_userdata('error_msg', 'Some problems occured, please try again.');
    }
	
	
	 public function category(){
		 $data['member1']= $this->member->getallcat();;
		// var_dump($data);
		 //exit;
		  $this->load->view('templates/header', $data);
		 $this->load->view('members/category', $data);
		 $this->load->view('templates/footer');
		 
	 }
	
	
	
	public function update(){
		//var_dump($_REQUEST);
		$arr = array();
		$str=$this->input->post('businessType1');
		if(isset($str)){
	 $arr=implode(",",$str);
		}
		
		$data1= array(
		          
           
                
                'conti_asign_id' =>$arr,
				
            );
			
			$id= $this->input->post('id');
			$update =$this->member->update($data1, $id);
		 $this->load->view('templates/header' );
        $this->load->view('members/update');
        $this->load->view('templates/footer');
		
	}
	
    
    public function add(){
          $data = array();
        $memData = array();
	//$memData = $this->member->getRows(array('sales_id' => $id));;
             $data['member1']= $this->member->getallcat();;
			
             //$this->member->getall($id);;
         // If add request is submitted
        // Prepare member data
            

            // Validate submitted form data
           
                // Insert member data
				
				if(isset($_POST['cat_name'])){
					$str=$this->input->post('businessType1');
					$arr=implode(",",$str);
					
					$data1['cat_id'] = $this->input->post('cat_id');
					$data1['cat_name'] = $this->input->post('cat_name');
					$data1['saleteam_id'] = $this->input->post('saleteam_id');
					$data1['conti_asign_id'] = $arr;
					$data2 = array(
         
     'saleteam_id' => $this->input->post('saleteam_id')
      //'country'   => $this->input->post('country')
            );
		
    $insert = $this->member->insert($data1, $data2);
  

	  $this->session->set_flashdata("message","Record  Updated!");
	//$this->session->set_userdata('success_msg', 'Member has been updated successfully.');
                    redirect('members');
	
}
 

         $data['member'] = $memData;
		//$data['member'] = $memData1;
        $data['title'] = 'Add Member';
        
        // Load the add page view
        $this->load->view('templates/header', $data);
        $this->load->view('members/add-domain', $data);
        $this->load->view('templates/footer');
    }
    
    public function edit($id){
        $data = array();
        
        // Get member data
        $memData = $this->member->getRows(array('sales_id' => $id));
		$memData1= $this->member->getall($id);;
		
	;
        
        // If update request is submitted
        if($this->input->post('memSubmit')){
            // Form field validation rules
            
            $this->form_validation->set_rules('sales_per_name', 'sales_per_name', 'required');
            $this->form_validation->set_rules('cat_name', 'cat_name','required');
         $this->form_validation->set_rules('conti_asign_id', 'conti_asign_id','required');
            
            // Prepare member data
            $memData[] = array(
                'sales_per_name'=>$this->input->post('sales_per_name'),
                'cat_name' =>$this->input->post('category-selected'),
                'conti_asign_id' =>$this->input->post('region-selected'),
            );
        
            // Validate submitted form data
         
                // Update member data
                $update = $this->member->update($memData, $id);
				
                 
                if($update){
					 $this->session->set_flashdata('msg', 'Member has been updated successfully.');
                    //$this->session->set_userdata('success_msg', 'Member has been updated successfully.');
                    redirect('members');
                }
        }

        $data['member'] = $memData;
		$data['memberdata'] = $memData1;
		
        $data['title'] = 'Update Member';
       
        // Load the edit page view
        $this->load->view('templates/header', $data);
        $this->load->view('members/add-edit', $data);
        $this->load->view('templates/footer');
    }
    
    public function delete($id){
        // Check whether member id is not empty
        if($id){
            // Delete member
            $delete = $this->member->delete($id);
            
            if($delete){
                $this->session->set_userdata('success_msg', 'Member has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occured, please try again.');
            }
        }
        
        // Redirect to the list page
        redirect('members');
    }
	
	 public function catview($id){
        $data = array();
       
        // Check whether member id is not empty
        if(!empty($id)){
           $data['member'] = $this->member->getRows(array('id' => $id));;
		   //var_dump($data['member']);
		   //exit;
			$data['member1']= $this->member->getall($id);;
			$data['member2']= $this->member->getcont($id);;
			$data['member3']= $this->member->getcatname($id);;
			$data['member4']=$this->member->getallct($id);;
			//var_dump($data['member3']);
//exit;
            $data['title']  = 'Sales Member Details';
            
            // Load the details page view
            $this->load->view('templates/header', $data);
            $this->load->view('members/catview', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('members');
        }
    }
	
	
	
	
}