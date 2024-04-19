<?php

	class Staff_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}

    public function staffselect($created_date){
        if($created_date !=''){
         $sql = "SELECT * FROM `staff`  WHERE `created_date`='$created_date'";
        }else{
            $sql = "SELECT * FROM `staff`";
        }
        $query=$this->db->query($sql);
          $result = $query->result();
          return $result;
        }
        
	
    public function emselect(){
    $sql = "SELECT * FROM `staff` ";
    $query=$this->db->query($sql);
  	$result = $query->result();
  	return $result;
	}
    public function Add($data){
        $this->db->insert('staff',$data);
    }
   
    public function GetBasic($id){
        $sql = "SELECT `staff`.*
        FROM `staff`
        
        WHERE `id`='$id'";
          $query=$this->db->query($sql);
          $result = $query->row();
          return $result;          
      }
      public function Update($data,$id){
		$this->db->where('id', $id);
		$this->db->update('staff',$data);        
    }
    public function DeletApply($id){
        $this->db->delete('staff',array('id'=> $id));
    }

  public function File_Upload($data){
      $this->db->insert('staff_file',$data);
    }
   
    public function GetFileInfo($id){
      $sql = "SELECT * FROM `staff_file` WHERE `em_id`='$id'";
      $query = $this->db->query($sql);
      $result = $query->result();
      return $result; 
  }
   

     public function DeletDOC($id){
      $this->db->delete('staff_file',array('id'=> $id));
  }

    }
?>