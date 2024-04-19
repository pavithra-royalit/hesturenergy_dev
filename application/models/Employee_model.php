<?php

	class Employee_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}

	
    public function emselect(){
    $sql = "SELECT * FROM `employee` WHERE `status`='ACTIVE' AND `em_role` !='ADMIN'";
    $query=$this->db->query($sql);
  	$result = $query->result();
  	return $result;
	}
    public function emselectByID($emid){
    $sql = "SELECT * FROM `employee`
      WHERE `em_id`='$emid'";
    $query=$this->db->query($sql);
	$result = $query->row();
	return $result;
	}
    public function emselectByCode($emid){
    $sql = "SELECT * FROM `employee`
      WHERE `em_code`='$emid'";
    $query=$this->db->query($sql);
	$result = $query->row();
	return $result;
	}
    public function getInvalidUser(){
      $sql = "SELECT * FROM `employee`
      WHERE `status`='INACTIVE'";
        $query=$this->db->query($sql);
		$result = $query->result();
		return $result;
	}
    public function Does_email_exists($email) {
		$user = $this->db->dbprefix('employee');
        $sql = "SELECT `em_email` FROM $user
		WHERE `em_email`='$email'";
		$result=$this->db->query($sql);
        if ($result->row()) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function Add($data){
        $this->db->insert('employee',$data);
    }
    public function GetBasic($id){
      $sql = "SELECT `employee`.*
      FROM `employee`
      
      WHERE `em_id`='$id'";
        $query=$this->db->query($sql);
		$result = $query->row();
		return $result;          
    }

    
    public function GetAllEmployee(){
      $sql = "SELECT * FROM `employee`";
        $query=$this->db->query($sql);
		$result = $query->result();
		return $result;          
    }
  
    public function Update($data,$id){
		$this->db->where('em_id', $id);
		$this->db->update('employee',$data);        
    }
    
    public function Reset_Password($id,$data){
		$this->db->where('em_id', $id);
		$this->db->update('employee',$data);        
    }
    
    public function GetEmployeeId($id){
        $sql = "SELECT `em_password` FROM `employee` WHERE `em_id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result; 
    }
   
       public function File_Upload($data){
      $this->db->insert('employee_file',$data);
    }
   
    public function GetFileInfo($id){
      $sql = "SELECT * FROM `employee_file` WHERE `em_id`='$id'";
      $query = $this->db->query($sql);
      $result = $query->result();
      return $result; 
  }
   
     public function doc_approval($data,$id){
       		$this->db->where('em_id', $id);
		$this->db->update('employee',$data);        
    }
    
     public function DeletDOC($id){
      $this->db->delete('employee_file',array('id'=> $id));
  }
   public function KYCbyib($id){
        $sql = "SELECT * FROM `employee_file` WHERE `id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result; 
    }
       public function Update_FileInfo($id,$data){
		$this->db->where('id', $id);
		$this->db->update('employee_file',$data);         
    }
   
    }
?>