<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Model{
    
    function __construct() {
        // Set table name
        $this->table = 'zoho_salesteam';
		//$this->table1='update_members';
		$this->table2='zoho_category_conti_user';
    }

  //get regions from db

    function getregion(){

      
      $this->db->select('*');
      $this->db->from('zoho_continent');
       $query = $this->db->get();
      $result = ($query->num_rows() > 0)?$query->result_array():FALSE;

      
      return $result;

    }

function search_pre_user($newcat,$trimregion){
	
	$preuser=$this->db->select('sales_per_name'); 
 $this->db->from('zoho_category_conti_user');
 $this->db->join('zoho_salesteam','zoho_category_conti_user.saleteam_id=zoho_salesteam.sales_id');
 $this->db->where('cat_name', $newcat);	
  $this->db->where_in ('conti_asign_id',$trimregion);
  
$query1 = $this->db->get();
 return $query1->result_array(); 

	
}



    function update_zoho_lead($data, $cat, $region){
		
	
     //$this->db->update_batch('zoho_category_conti_user1', $data, 'conti_asign_id, cat_name');

      /*$this->db->select('*');
      $this->db->from('zoho_category_conti_user');

      $this->db->where('conti_asign_id', $region);
      $this->db->where('cat_name', $cat);
      $query = $this->db->get();
     if($query->num_rows() > 0){


        $trnsaction_array[]= $query->result_array();
      }
  */
      

      
	  
	   //exit;
	  
	  $data1 = array(

        'modified_by' => $_SESSION['name'],
		
		 'upd_salemem'=>$data["saleteam_id"],
        'date_modified' => date("Y-m-d"),
        'upd_category' => $cat,
		'upd_regions'=> $region
      );
	  

	   $this->db->insert('logs',$data1);
      
       //$trnsaction_array[]=$this->db->affected_rows();

      $this->db->where('conti_asign_id', $region);
      $this->db->where('cat_name', $cat);
      $this->db->update('zoho_category_conti_user', $data);
	   
      return $this->db->affected_rows();

	  
    }

    /*
     * Fetch members data from the database
     * @param array filter data based on the passed parameters
     */
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->table);
        
        if(array_key_exists("conditions", $params)){
            foreach($params['conditions'] as $key => $val){
                $this->db->where($key, $val);
            }
        }
        
        if(!empty($params['searchKeyword'])){
            $search = $params['searchKeyword'];
            $likeArr = array('sales_per_name' => $search, 'sales_id' => $search, 'tokan_id' => $search);
            $this->db->or_like($likeArr);
        }
        
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();
        }else{
            if(array_key_exists("sales_id", $params)){
                $this->db->where('sales_id', $params['sales_id']);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $this->db->order_by('sales_per_name', 'asc');
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit'],$params['start']);
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit']);
                }
                
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }
        
        // Return fetched data
        return $result;
    }
    
    /*
     * Insert members data into the database
     * @param $data data to be insert based on the passed parameters
     */
  public function insert($data1 = array(), $data2 = array()) {
	
	
      if(!empty($data1)){
		  
           $update = $this->db->update($this->table2, $data2, array('cat_id' => $data1['cat_id'], 'cat_name' => $data1['cat_name'], 'conti_asign_id' => $data1['conti_asign_id']));
		   
        return $update?true:false;
        }else{
			
			
		}
        return false;
    }
    
    /*
     * Update member data into the database
     * @param $data array to be update based on the passed parameters
     * @param $id num filter data
     */
    public function update($data, $id) {
		//var_dump($data);
		//exit;
        if(!empty($data) && !empty($id)){
            // Add modified date if not included
            
               // $data['modified'] = date("Y-m-d H:i:s");
				//var_dump($data['modified']);
				//exit;
            
            
            // Update member data
            $update = $this->db->update($this->table2, $data, array('id' => $id));

           // var_dump($update);
			//exit;
            // Return the status
            return $update?true:false;
        }
        return false;
    }
    
    /*
     * Delete member data from the database
     * @param num filter data based on the passed parameter
     */
    public function delete($id){
        // Delete member data
        $delete = $this->db->delete($this->table2, array('id' => $id));
        
        // Return the status
        return $delete?true:false;
    }
	public function getall(){
		
		
		
		$this->db->select("id,sales_id,cat_name,saleteam_id,conti_asign_id,sales_per_name");
  $this->db->from('zoho_category_conti_user');
  $this->db->join('zoho_salesteam','zoho_category_conti_user.saleteam_id=zoho_salesteam.sales_id');
  $this->db->order_by('sales_per_name');
  $query = $this->db->get();
  
  return $query->result();
		
		
		//var_dump($id);
		//exit;


	
				
	}
	
	public function getallct($id){
		//var_dump($id);
		//exit;
	$ret=$this->db->select('sales_id,sales_per_name,')
	->where('sales_id',$id)
 ->get('zoho_salesteam');
  //$query = $this->db->get('');
  //var_dump($ret);
  //exit;
    return $ret->result_array(); 

	
				
	}
	
	public function getcont($id){
		
	$ret=$this->db->select('conti_id,conti_name')
	->where('conti_id',$id)
 ->get('zoho_continent');
  //$query = $this->db->get('');
 
    return $ret->result_array(); 
	
				
	}
	public function getcat(){
	$this->db->select('*'); 
 $this->db->from('zoho_category_conti_user');
  $query = $this->db->get('');
   
				
	}
	
	public function getallcat(){
	$this->db->distinct()->select('cat_name,cat_id');
 $this->db->from('zoho_category_conti_user');
  $query = $this->db->get('');
  return $query->result_array();  
				
	}
	
	public function getcatname($id){
	$catname=$this->db->select('id,cat_id,cat_name,saleteam_id,conti_asign_id,sales_per_name')
	->from('zoho_category_conti_user')
	->join('zoho_salesteam','zoho_category_conti_user.saleteam_id=zoho_salesteam.sales_id')
    ->where('cat_id',$id)	
	 ->get();
	 return $catname->result_array(); 

	}
	
	
	
	
}