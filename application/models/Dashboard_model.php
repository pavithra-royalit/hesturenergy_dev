<?php

	class Dashboard_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}
	
	 public function GetdocApproval(){
        $sql = "SELECT * FROM `employee` WHERE doc_status='1' ORDER BY id DESC;";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result; 
        }
   
    }
?>