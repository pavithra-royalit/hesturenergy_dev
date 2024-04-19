<?php

	class Vehicle_model extends CI_Model {


	function __consturct(){
	parent::__construct();
	
	}
    public function Add_VehicleInfo($data){
        $this->db->insert('tbl_vehicle',$data);
    }

    public function GetAllVehInfo(){
        $sql = "SELECT * FROM `tbl_vehicle`";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
  
    public function GetLeaveValue($id){
        $sql = "SELECT * FROM `tbl_vehicle` WHERE `id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result; 
    }
   
   
   
    public function Update_VehicleInfo($id,$data){
		$this->db->where('id', $id);
		$this->db->update('tbl_vehicle',$data);         
    }

    public function DeletVehicle($id){
        $this->db->delete('tbl_vehicle',array('id'=> $id));        
    }


    }
?>    