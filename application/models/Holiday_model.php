<?php

	class Holiday_model extends CI_Model {


	function __consturct(){
	parent::__construct();
	
	}
    public function Add_HolidayInfo($data){
        $this->db->insert('holiday',$data);
    }

    public function GetAllHoliInfo(){
        $sql = "SELECT * FROM `holiday`";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
  
    public function GetLeaveValue($id){
        $sql = "SELECT * FROM `holiday` WHERE `id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result; 
    }
   
   
   
    public function Update_HolidayInfo($id,$data){
		$this->db->where('id', $id);
		$this->db->update('holiday',$data);         
    }

    public function DeletHoliday($id){
        $this->db->delete('holiday',array('id'=> $id));        
    }


    }
?>    