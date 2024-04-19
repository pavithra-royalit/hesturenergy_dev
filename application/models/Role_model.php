<?php

	class Role_model extends CI_Model {


	function __consturct(){
	parent::__construct();
	
	}
    public function Add_RoleInfo($data){
        $this->db->insert('role',$data);
    }

    public function GetAllRolInfo(){
        $sql = "SELECT * FROM `role`";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
  
    public function GetLeaveValue($id){
        $sql = "SELECT * FROM `role` WHERE `id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result; 
    }
   
   
   
    public function Update_RoleInfo($id,$data){
		$this->db->where('id', $id);
		$this->db->update('role',$data);         
    }

    public function DeletRole($id){
        $this->db->delete('role',array('id'=> $id));        
    }


    }
?>    