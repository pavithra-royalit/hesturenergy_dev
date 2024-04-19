<?php

	class Pos_model extends CI_Model {


	function __consturct(){
	parent::__construct();
	
	}
    public function Add_PosInfo($data){
          
        $this->db->insert('quotation',$data);
    }

    public function GetAllPosInfo(){
         $id = $this->session->userdata('user_login_id');
         $basicinfo = $this->employee_model->GetBasic($id); 
         if($this->session->userdata('user_type')=='DEALER'){
        
        $sql = "SELECT * FROM `quotation` where created_by='$basicinfo->id'";
         }else{
        $sql = "SELECT * FROM `quotation` ";
         }
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
  
     public function GetAlldealerPosInfo(){
          $id = $this->session->userdata('user_login_id');
         $basicinfo = $this->employee_model->GetBasic($id); 
         
        $sql = "SELECT * FROM `quotation` where created_by='$basicinfo->id'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
  
     public function GetAllInvoiceInfo(){
          $id = $this->session->userdata('user_login_id');
         $basicinfo = $this->employee_model->GetBasic($id); 
         if($this->session->userdata('user_type')=='DEALER'){
        
        $sql = "SELECT * FROM `invoice` where created_by='$basicinfo->id'";
         }else{
             
            $sql = "SELECT * FROM `invoice`"; 
         }
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
      public function GetAlljobcardInfo(){
             $id = $this->session->userdata('user_login_id');
         $basicinfo = $this->employee_model->GetBasic($id); 
         if($this->session->userdata('user_type')=='DEALER'){
           $sql = "SELECT * FROM `jobcode` where created_by='$basicinfo->id'";  
         }else{
        $sql = "SELECT * FROM `jobcode` ";
         }
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

  

     

    }
?>    