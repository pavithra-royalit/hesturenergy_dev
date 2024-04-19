<?php

	class Lead_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}

    public function leadselect($created_date){
     if($created_date !=''){
         $sql = "SELECT * FROM `leads`  WHERE `created_date`='$created_date'";
        }else{
            $sql = "SELECT * FROM `leads` ORDER BY created_date DESC;";
        }
        $query=$this->db->query($sql);
          $result = $query->result();
          return $result;
        }
    public function emselect(){
    $sql = "SELECT * FROM `leads` ";
    $query=$this->db->query($sql);
  	$result = $query->result();
  	return $result;
	}
    public function Add($data){
        $this->db->insert('leads',$data);
    }
    public function GetBasic($id){
        $sql = "SELECT `leads`.*
        FROM `leads`
        
        WHERE `id`='$id'";
          $query=$this->db->query($sql);
          $result = $query->row();
          return $result;          
      }
      public function Update($data,$id){
		$this->db->where('id', $id);
		$this->db->update('leads',$data);        
    }
    public function DeletApply($id){
        $this->db->delete('leads',array('id'=> $id));
    }

    public function GetNotes($id){
        $sql = "SELECT * FROM `led_timeline`
        WHERE `emp_id`='$id'";
          $query=$this->db->query($sql);
          $result = $query->result();
          return $result;          
      }
      public function Update_Notes($id,$data){
		$this->db->where('id', $id);
		$this->db->update('led_timeline',$data);        
    }
    public function Add_Notes($data){
        $this->db->insert('led_timeline',$data);
    }
    public function GetExpValue($id){
        $sql = "SELECT * FROM `led_timeline` WHERE `id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result; 
    }
    public function DeletEXP($id){
        $this->db->delete('led_timeline',array('id'=> $id));
    }

    public function Updatelead($id,$data){
      //  print_r($data);
		$this->db->where('id', $id);
		$this->db->update('leads',$data);        
    }


    }
?>