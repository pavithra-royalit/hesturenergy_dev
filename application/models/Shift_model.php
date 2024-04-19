<?php

	class Shift_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}

    public function emselect(){
        $sql = "SELECT * FROM `office_shift` ";
        $query=$this->db->query($sql);
          $result = $query->result();
          return $result;
        }
	
    public function GetBasic($id){
        $sql = "SELECT *
        FROM `office_shift`
        
        WHERE `id`='$id'";
          $query=$this->db->query($sql);
          $result = $query->row();
          return $result;          
      }
      
    public function GetShift($id){
        $sql = "SELECT * FROM `office_shift`
        WHERE `id`='$id'";
          $query=$this->db->query($sql);
          $result = $query->result();
          return $result;          
      }
      public function Update_Shift($id,$data){
		$this->db->where('id', $id);
		$this->db->update('office_shift',$data);        
    }
    public function Add_Shift($data){
        $this->db->insert('office_shift',$data);
    }
    public function GetExpValue($id){
        $sql = "SELECT * FROM `office_shift` WHERE `id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result; 
    }
    public function DeletEXP($id){
        $this->db->delete('office_shift',array('id'=> $id));
    }

   

    }
?>