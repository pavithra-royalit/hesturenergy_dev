<?php

	class Customer_model extends CI_Model {


	function __consturct(){
	parent::__construct();
	
	}
    public function Add_CustomerInfo($data){
        $this->db->insert('customer',$data);
    }

    public function GetAllCustomerInfo($id){

        $id2 = $this->session->userdata('user_login_id');
         $basicinfo = $this->employee_model->GetBasic($id2); 
         
         if($this->session->userdata('user_type')=='DEALER'){
        $sql = "SELECT * FROM `customer` where created_by='$basicinfo->id' ";
         }else{
         $sql = "SELECT * FROM `customer` where created_by='$id'";
         }
  
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
  
    public function GetLeaveValue($id){
        $sql = "SELECT * FROM `customer` WHERE `id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result; 
    }
   
   
   
    public function Update_CustomerInfo($id,$data){
		$this->db->where('id', $id);
		$this->db->update('customer',$data);         
    }

    public function DeletCustomer($id){
        $this->db->delete('customer',array('id'=> $id));        
    }
    public function Deletquotation($id){
      $this->db->delete('quotation',array('id'=> $id));        
  }

  public function GetBasic($id){
        $sql = "SELECT *
        FROM `customer`
        
        WHERE `id`='$id'";
          $query=$this->db->query($sql);
          $result = $query->row();
          return $result;          
      }

      public function add_pos($data){
        $this->db->insert('pos_item',$data);
      }
      public function GetPos($id){
        $sql = "SELECT * FROM `pos_item` WHERE `pos_code`='$id'";
        // print_r($sql);
               $query = $this->db->query($sql);
               $result = $query->result();
               return $result; 
      }
      public function DeletPos($id){
        $this->db->delete('pos_item',array('id'=> $id));        
    }
      public function GetTotal($id){
        $sql = "SELECT SUM(total) as total FROM `pos_item` WHERE `pos_id`='$id'";
               $query = $this->db->query($sql);
               $result = $query->result();
               return $result; 
      }

      public function GetposValue($id){
        $sql = "SELECT * FROM `quotation` WHERE `id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result; 
    }

    public function Add_VehicleInfo($data){
      $this->db->insert('quotation',$data);
  }
  public function Add_Info1($data){
  //  echo "<pre>"; print_r($data);die;
    $this->db->insert('pos_item',$data);
}

  
  public function Update_VehicleInfo($id,$data){
		$this->db->where('pos_code', $id);
		$this->db->update('quotation',$data);         
    }

    public function GetAllVehInfo(){
      $sql = "SELECT * FROM `quotation`";
      $query = $this->db->query($sql);
      $result = $query->result();
      return $result;
  }

  public function GetAllPosInfo($posid){
    $sql = "SELECT * FROM `quotation` where pos_code=$posid";
    $query = $this->db->query($sql);
    $result = $query->result();
    return $result;
}

   public function Add_NoteInfo($data){
        $this->db->insert('notes',$data);
    }

    public function Update_NoteInfo($id,$data){
		$this->db->where('id', $id);
		$this->db->update('notes',$data);         
    }

 public function Notebyib($id){
        $sql = "SELECT * FROM `notes` WHERE `id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result; 
    }
  public function GetAllNotesInfo($id){
        $sql = "SELECT * FROM `notes`  WHERE `cid`='$id'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
 public function Deletnotes($id){
      $this->db->delete('notes',array('id'=> $id));        
  }

  public function Add_JobcodeInfo($data){
    $this->db->insert('jobcode',$data);
}

public function GetAllJobcardInfo($id){
  $sql = "SELECT * FROM `jobcode` WHERE `cid`='$id'";
  // print_r($sql);
         $query = $this->db->query($sql);
         $result = $query->result();
         return $result; 
}

public function GetJob($jid){
  $sql = "SELECT * FROM `jobcode` WHERE `job_code`='$jid'";
  // print_r($sql);
         $query = $this->db->query($sql);
         $result = $query->result();
         return $result; 
}
public function GetJobitem($jid){
  $sql = "SELECT * FROM `jobcode_item` WHERE `job_code`='$jid'";
  // print_r($sql);
         $query = $this->db->query($sql);
         $result = $query->result();
         return $result; 
}
public function DeletJob($id){
  $this->db->delete('jobcode_item',array('id'=> $id));        
}
public function add_job($data){
  $this->db->insert('jobcode_item',$data);
}

public function Update_JobcodeInfo($id,$data){
  $this->db->where('id', $id);
  $this->db->update('jobcode',$data);         
  }

public function Deletjobcard($id){
  $this->db->delete('jobcode',array('id'=> $id));        
}
public function GetModelValue($id){
  $sql = "SELECT model FROM `tbl_vehicle` WHERE `id`='$id'";
  $query = $this->db->query($sql);
  $result = $query->row();
  return $result; 
}

 public function GetAlldisVehInfo(){

    $sql = "SELECT DISTINCT(vehicle_name) FROM `quotation`";

    $query = $this->db->query($sql);

    $result = $query->result();

    return $result;

}

public function GetVehicleValue(){

  $sql = "SELECT * FROM `quotation`";

  $query = $this->db->query($sql);

  $result = $query->row();

  return $result; 

}



public function GetVValue($id){

  $sql = "SELECT * FROM `quotation` WHERE `id`='$id'";

  $query = $this->db->query($sql);

  $result = $query->row();

  return $result; 

}



public function Add_InvoiceInfo($data){



  $this->db->insert('invoice',$data);

}



public function Update_InvoiceInfo($id,$data){

$this->db->where('id', $id);

$this->db->update('invoice',$data);         

}



public function GetAllinvoiceInfo($id){

  $sql = "SELECT * FROM `invoice`  WHERE `cid`='$id'";

  $query = $this->db->query($sql);

  $result = $query->result();

  return $result;

}

public function Invoicebyib($id){

  $sql = "SELECT * FROM `invoice` WHERE `id`='$id'";

  $query = $this->db->query($sql);

  $result = $query->row();

  return $result; 

}

public function GetAllinovInfo($id){

  $sql = "SELECT * FROM `invoice`  WHERE `inov_num`='$id'";

  $query = $this->db->query($sql);

  $result = $query->result();

  return $result;

}

public function GetJobcardInfo($jobcardid){
  $sql = "SELECT * FROM `jobcode` WHERE `job_code`='$jobcardid'";
  // print_r($sql);
         $query = $this->db->query($sql);
         $result = $query->result();
         return $result; 
}

 public function GetdisnumberplateInfo(){

    $sql = "SELECT DISTINCT(number_plate) FROM `quotation`";

    $query = $this->db->query($sql);

    $result = $query->result();

    return $result;

}
     public function GetJobcard_item($jobcardid){
        $sql = "SELECT * FROM `jobcode_item` WHERE `job_code`='$jobcardid'";
        // print_r($sql);
               $query = $this->db->query($sql);
               $result = $query->result();
               return $result; 
      }

    }
?>    