<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model');
        $this->load->model('employee_model');
        $this->load->model('customer_model');
        $this->load->model('settings_model');
        $this->load->model('vehicle_model');
    }

    public function index()
	{
		if ($this->session->userdata('user_login_access') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('user_login_access') == 1)
          $data= array();
        redirect('customer/Customers');
	}
    
    public function Customers()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id = $this->input->get('I');
            $data['customer'] = $this->customer_model->GetAllCustomerInfo($id);
            $this->load->view('backend/customer/customer', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function Add_Customers()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id      = $this->input->post('id');
            $did      = $this->input->post('did');
            $name    = $this->input->post('name');
            $address   = $this->input->post('address');
            $city   = $this->input->post('city');
            $state   = $this->input->post('state');
            $zip   = $this->input->post('zip');
            $phone   = $this->input->post('phone');
            $email   = $this->input->post('email');
            $company_name   = $this->input->post('company_name');
            $gst   = $this->input->post('gst');
            $created_date = date('Y-m-d');
            $emrand = substr($name,0,3).rand(1000,2000);  
          
          
                $data = array();
                $data = array(
                    'name' => $name,
                    'address' => $address,
                    'city' => $city,
                    'state' => $state,
                    'zip' => $zip,
                    'phone' => $phone,
                    'email' => $email,
                    'company_name' => $company_name,
                    'gst' => $gst,
                    'created_date' => $created_date,
                    'po_code' => $emrand,
                    'created_by' => $did,
                   );
                if (empty($id)) {
                    $success = $this->customer_model->Add_CustomerInfo($data);
                    $this->session->set_flashdata('feedback', 'Successfully Added');
                    #redirect("leave/Holidays");
                    echo "Successfully Added";
                } else {
                    $success = $this->customer_model->Update_CustomerInfo($id, $data);
                    $this->session->set_flashdata('feedback', 'Successfully Updated');
                    #redirect("leave/Holidays");
                    echo "Successfully Updated";
                }
                
            
        } else {
            redirect(base_url(), 'refresh');
        }
    }

     

    public function Customerbyib()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id                   = $this->input->get('id');
            $data['holidayvalue'] = $this->customer_model->GetLeaveValue($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function CUSvalueDelet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id      = $this->input->get('id');
            $success = $this->customer_model->DeletCustomer($id);
            echo "Successfully Deletd";
        } else {
            redirect(base_url(), 'refresh');
        }
    }
      public function customer_view(){
        if($this->session->userdata('user_login_access') != False) {
        $id = base64_decode($this->input->get('I'));
        $data['basic'] = $this->customer_model->GetBasic($id);
        $data['pos'] = $this->customer_model->GetPos($id);
        $data['total'] = $this->customer_model->GetTotal($id);
        $this->load->view('backend/customer_view',$data);
        }
    else{
        redirect(base_url() , 'refresh');
    }         
    }

    public function customerview(){
        if($this->session->userdata('user_login_access') != False) {
        $id = base64_decode($this->input->get('I'));
        $data['basic'] = $this->customer_model->GetBasic($id);
     
        $this->load->view('backend/customer/customerview',$data);
        }
    else{
        redirect(base_url() , 'refresh');
    }         
    }

    public function posview(){
        if($this->session->userdata('user_login_access') != False) {
        $id = base64_decode($this->input->get('I'));
        $data['basic'] = $this->customer_model->GetBasic($id);
        $data['pos'] = $this->customer_model->GetPos($id);
        // $data['total'] = $this->customer_model->GetTotal($id);
        $data['vehicle'] = $this->customer_model->GetAllVehInfo();
      
        $this->load->view('backend/customer/posview',$data);
        }
    else{
        redirect(base_url() , 'refresh');
    }         
    }

    public function jobcardview(){
        if($this->session->userdata('user_login_access') != False) {
        $id = base64_decode($this->input->get('I'));
        $data['basic'] = $this->customer_model->GetBasic($id);
        $data['pos'] = $this->customer_model->GetPos($id);
        // $data['total'] = $this->customer_model->GetTotal($id);
        $data['vehicle'] = $this->customer_model->GetAllVehInfo();
        $data['jobcard'] = $this->customer_model->GetAllJobcardInfo($id);
          $data['notes'] = $this->customer_model->GetAllNotesInfo($id);
      
        $this->load->view('backend/customer/jobcardview',$data);
        }
    else{
        redirect(base_url() , 'refresh');
    }         
    }

    public function notesview(){
        if($this->session->userdata('user_login_access') != False) {
        $id = base64_decode($this->input->get('I'));
        $data['basic'] = $this->customer_model->GetBasic($id);
        $data['pos'] = $this->customer_model->GetPos($id);
        // $data['total'] = $this->customer_model->GetTotal($id);
        $data['vehicle'] = $this->customer_model->GetAllVehInfo();
        $data['jobcard'] = $this->customer_model->GetAllJobcardInfo($id);
          $data['notes'] = $this->customer_model->GetAllNotesInfo($id);
      
        $this->load->view('backend/customer/notesview',$data);
        }
    else{
        redirect(base_url() , 'refresh');
    }         
    }


                        public function Add_POS()
                        {
                            if ($this->session->userdata('user_login_access') != False) {
                                $em_id = $this->input->post('em_id');    		
                                $item = $this->input->post('item');    
                                $qty = $this->input->post('qty');    
                                $price = $this->input->post('price');    
                                $total = $this->input->post('total');    
                                $created_date = date('Y-m-d');	
                                 $created_by = $this->input->post('created_by');
                               
                              
                              
                                    $data = array();
                                    $data = array(
                                        'customer_id' => $em_id,
                                        'item' => $item,
                                        'qty' => $qty,
                                        'price' => $price,
                                        'total' => $total,
                                        'created_date' => $created_date,
                                         'created_by' => $created_by,
                                       );
                         
                                        $success = $this->customer_model->add_pos($data);
                                        $this->session->set_flashdata('feedback', 'Successfully Added');
                                        #redirect("leave/Holidays");
                                        echo "Successfully Added";
                                    
                                
                            } else {
                                redirect(base_url(), 'refresh');
                            }
                        }
                    
                        public function pocvalueDelet()
                        {
                            if ($this->session->userdata('user_login_access') != False) {
                                $id      = $this->input->get('id');
                                $success = $this->customer_model->DeletPos($id);
                                echo "Successfully Deletd";
                            } else {
                                redirect(base_url(), 'refresh');
                            }
                        }          
                      
                        public function Add_Vehicle()
                        {
                            // echo "<pre>";print_r($_POST);

                            if ($this->session->userdata('user_login_access') != False) {
                                $id      = $this->input->post('id');
                                $cid      = $this->input->post('cid');
                                $vehicle_name    = $this->input->post('vehicle_name');
                                $model    = $this->input->post('model');
                                $number_plate    = $this->input->post('number_plate');
                                $vehicle_price    = $this->input->post('vehicle_price');
                                $qty    = $this->input->post('qty');
                                $total    = $this->input->post('total');
                                $tax    = $this->input->post('tax');
                                $need_item = $this->input->post('need_item');
                                $created_by = $this->input->post('created_by');
                              
                                if($id ==''){
                                $pos_code = substr($vehicle_name,0,3).rand(1000,2000); 
                                $vitem    = $this->input->post('vitem');
                                $vqty    = $this->input->post('vqty');
                                $vprice    = $this->input->post('vprice');
                                $vtotal    = $this->input->post('vtotal');
                                $vtax    = $this->input->post('vtax');
                                $pos_id    = $this->input->post('pos_id');
                                                                                  
                                    $main_arr=array();
                                    $data=$this->input->post();
                                            for($i=0;$i<sizeof($data['vitem']);$i++)
                                            {
                                                $arr=array(
                                                    'vitem' => $data['vitem'][$i],
                                                    'vqty' =>  $data['vqty'][$i] ,
                                                    'vprice' => $data['vqty'][$i] ,
                                                    'vtotal'=> $data['vqty'][$i] ,
                                                     'vtax'=> $data['vtax'][$i] ,
                                                    'pos_id'=> $data['pos_id'][$i],
                                                    'pos_code'=> $pos_code 
                                                );
                                                $main_arr[]=$arr;
                                            }
                                    $resp=$this->db->insert_batch('pos_item',$main_arr);
                                   
                                        $data = array(
                                        'pos_code' => $pos_code,
                                        'customer_id' => $cid,
                                        'vehicle_name' => $vehicle_name,
                                        'vehicle_price' => $vehicle_price,
                                        'number_plate' => $number_plate,
                                        'model' => $model,
                                        'qty' => $qty,
                                        'total' => $total,
                                        'need_item' => $need_item,
                                        'tax' => $tax,
                                         'created_by' => $created_by,        
                                    );
                                
                                }else{
                                    $pos_code = $id;
                                        $data = array(
                                        'pos_code' => $pos_code,
                                        'customer_id' => $cid,
                                        'vehicle_name' => $vehicle_name,
                                        'vehicle_price' => $vehicle_price,
                                        'number_plate' => $number_plate,
                                        'model' => $model,
                                        'qty' => $qty,
                                        'total' => $total,
                                        'need_item' => $need_item,
                                        'tax' => $tax,
                                         'created_by' => $created_by,
                                                 
                                    );
                                }
                                 
                                
                                    if (empty($id)) {
                                        $success = $this->customer_model->Add_VehicleInfo($data);
                                        $this->session->set_flashdata('feedback', 'Successfully Added');
                                        echo "Successfully Added";
                                    } else {
                                        $success = $this->customer_model->Update_VehicleInfo($id, $data);
                                        $this->session->set_flashdata('feedback', 'Successfully Updated');
                                        echo "Successfully Updated";
                                    }
                                    
                                
                            } else {
                                redirect(base_url(), 'refresh');
                            }
                        }
                    
                        
    public function Vehiclebyib()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id  = $this->input->get('id');
            $data['vehiclevalue'] = $this->customer_model->GetposValue($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
      
    
   public function Add_POS_item()
   {
       if ($this->session->userdata('user_login_access') != False) {
           $pos_id = $this->input->post('pos_id');    	
           $pos_code = $this->input->post('pos_code');	
           $vitem = $this->input->post('vitem');    
           $vqty = $this->input->post('vqty');    
           $vprice = $this->input->post('vprice');    
           $vtotal = $this->input->post('vtotal');  
            $vtax = $this->input->post('vtax');  
           $created_date = date('Y-m-d');		
          
         
         
               $data1 = array();
               $data1 = array(
                   'pos_id' => $pos_id,
                   'pos_code' => $pos_code,
                   'vitem' => $vitem,
                   'vqty' => $vqty,
                   'vprice' => $vprice,
                   'vtotal' => $vtotal,
                    'vtax' => $vtax,
                   'created_date' => $created_date,
                  );
    
                   $success = $this->customer_model->add_pos($data1);
                   $this->session->set_flashdata('feedback', 'Successfully Added');
                   #redirect("leave/Holidays");
                   echo "Successfully Added";
               
           
       } else {
           redirect(base_url(), 'refresh');
       }
   }
   public function qvalueDelet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id      = $this->input->get('id');
            $success = $this->customer_model->Deletquotation($id);
            echo "Successfully Deletd";
        } else {
            redirect(base_url(), 'refresh');
        }
    }
   
    public function edit_Pos()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $posid      = $this->input->get('id');
            $id = base64_decode($this->input->get('I'));       
            $data['basic'] = $this->customer_model->GetBasic($id);
            $data['pos_item'] = $this->customer_model->GetPos($posid);

            // $data['total'] = $this->customer_model->GetTotal($id);
            $data['vehicle'] = $this->customer_model->GetAllVehInfo();
             $data['pos'] = $this->customer_model->GetAllPosInfo($posid);
            // print_r($data['pos']);die;
            
          $data['notes'] = $this->customer_model->GetAllNotesInfo($id);
            $this->load->view('backend/customer/edit_pos', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function addPos()
    {
        if ($this->session->userdata('user_login_access') != False) {
                  $id = base64_decode($this->input->get('I'));       
            $data['basic'] = $this->customer_model->GetBasic($id);
                // $data['total'] = $this->customer_model->GetTotal($id);
            $data['vehicle'] = $this->customer_model->GetAllVehInfo();
                      // print_r($data['pos']);die;
                      $data['jobcard'] = $this->customer_model->GetAllJobcardInfo($id);          
          $data['notes'] = $this->customer_model->GetAllNotesInfo($id);
            $this->load->view('backend/customer/add_pos', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    
     public function view_Pos()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $posid      = $this->input->get('id');
            $id = base64_decode($this->input->get('I'));       
            $data['basic'] = $this->customer_model->GetBasic($id);
            $data['pos_item'] = $this->customer_model->GetPos($posid);

            // $data['total'] = $this->customer_model->GetTotal($id);
            $data['vehicle'] = $this->customer_model->GetAllVehInfo();
             $data['pos'] = $this->customer_model->GetAllPosInfo($posid);
            // print_r($data['pos']);die;
            
          $data['notes'] = $this->customer_model->GetAllNotesInfo($id);
            $this->load->view('backend/customer/view_pos', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    
      public function view_invoice()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $posid      = $this->input->get('id');
            $id = base64_decode($this->input->get('I'));       
            $data['basic'] = $this->customer_model->GetBasic($id);
            $data['pos_item'] = $this->customer_model->GetPos($posid);

            // $data['total'] = $this->customer_model->GetTotal($id);
            $data['vehicle'] = $this->customer_model->GetAllVehInfo();
             $data['pos'] = $this->customer_model->GetAllPosInfo($posid);
            // print_r($data['pos']);die;
            $this->load->view('backend/customer/view_invoice', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    

    public function Add_Notes()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id      = $this->input->post('id');
            $cid      = $this->input->post('cid');
            $title    = $this->input->post('title');
            $description    = $this->input->post('description');

           
               
                $data = array(
                    'cid' => $cid,
                    'title' => $title,
                    'description' => $description
                  
                );
                if (empty($id)) {
                    $success = $this->customer_model->Add_NoteInfo($data);
                    $this->session->set_flashdata('feedback', 'Successfully Added');
                    echo "Successfully Added";
                } else {
                    $success = $this->customer_model->Update_NoteInfo($id, $data);
                    $this->session->set_flashdata('feedback', 'Successfully Updated');
                    echo "Successfully Updated";
                }
                
            
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function Notebyib()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id  = $this->input->get('id');
            $data['rolevalue'] = $this->customer_model->Notebyib($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
     public function nvalueDelet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id      = $this->input->get('id');
            $success = $this->customer_model->Deletnotes($id);
            echo "Successfully Deletd";
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function addJobcard()
    {
        if ($this->session->userdata('user_login_access') != False) {
                  $id = base64_decode($this->input->get('I'));       
            $data['basic'] = $this->customer_model->GetBasic($id);
                // $data['total'] = $this->customer_model->GetTotal($id);
            $data['vehicle'] = $this->customer_model->GetAllVehInfo();
                      // print_r($data['pos']);die;
                      
          $data['notes'] = $this->customer_model->GetAllNotesInfo($id);
           $data['numberplate'] = $this->customer_model->GetdisnumberplateInfo();
            $this->load->view('backend/customer/add_jobcard', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    

    public function Add_jobcard()
    {
        // echo "<pre>";print_r($_POST) ; die;

        if ($this->session->userdata('user_login_access') != False) {
            $id      = $this->input->post('id');
            $cid      = $this->input->post('cid');
            $indate    = $this->input->post('indate');
            $outdate    = $this->input->post('outdate');
            $kmsrun    = $this->input->post('kmsrun');
            $chasis    = $this->input->post('chasis');
            $enginno    = $this->input->post('enginno');
            $model      = $this->input->post('model');
            $service_type    = $this->input->post('service_type');
             $status    = $this->input->post('status');
              $vehicle    = $this->input->post('vehicle');
               $model    = $this->input->post('model');
                $number_plate    = $this->input->post('number_plate');
                  $created_by    = $this->input->post('created_by');
            if($id ==''){
            $job_code = rand(1000,2000); 
            }else{
                $job_code      = $this->input->post('job_code');
            }
          
       
            if($id ==''){        
                $pitem    = $this->input->post('pitem');
                $pprice    = $this->input->post('pprice');
                $c_id      = $this->input->post('c_id');                                   
                $main_arr=array();
                $data=$this->input->post();
                        for($i=0;$i<sizeof($data['pitem']);$i++)
                        {
                            $arr=array(
                                'pitem' => $data['pitem'][$i],
                                'pprice' => $data['pprice'][$i] ,
                                'cid'=> $data['c_id'][$i],
                                'job_code'=> $job_code 
                            );
                            $main_arr[]=$arr;
                        }
                $resp=$this->db->insert_batch('jobcode_item',$main_arr);
                    }

                $data = array(
                    'job_code' => $job_code,
                    'cid' => $cid,
                    'indate' => $indate,
                    'outdate' => $outdate,
                    'kmsrun' => $kmsrun,
                    'chasis' => $chasis,
                    'enginno' => $enginno,
                    'model' => $model,
                    'service_type' => $service_type,
                    'status' => $status,
                     'vehicle' => $vehicle,
                      'model' => $model,
                       'number_plate' => $number_plate,
                        'created_by' => $created_by,
                   
                             
                );
                if (empty($id)) {
                    $success = $this->customer_model->Add_JobcodeInfo($data);
                    $this->session->set_flashdata('feedback', 'Successfully Added');
                    echo "Successfully Added";
                } else {
                    $success = $this->customer_model->Update_JobcodeInfo($id, $data);
                    $this->session->set_flashdata('feedback', 'Successfully Updated');
                    echo "Successfully Updated";
                }
                
            
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function edit_jobcard()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $jid      = $this->input->get('id');
            $id = base64_decode($this->input->get('I'));       
            $data['basic'] = $this->customer_model->GetBasic($id);
            $data['job_card'] = $this->customer_model->GetJob($jid);
            $data['job_item'] = $this->customer_model->GetJobitem($jid);
               $data['numberplate'] = $this->customer_model->GetdisnumberplateInfo();
            $this->load->view('backend/customer/edit_jobcard', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function Add_job_item()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $cid = $this->input->post('cid');    	
            $job_code = $this->input->post('job_code');	
            $pitem = $this->input->post('pitem');       
            $pprice = $this->input->post('pprice');      
            $created_date = date('Y-m-d');		
           
          
          
                $data1 = array();
                $data1 = array(
                    'cid' => $cid,
                    'job_code' => $job_code,
                    'pitem' => $pitem,
                    'pprice' => $pprice,
                    'created_date' => $created_date,
                   );
     
                    $success = $this->customer_model->add_job($data1);
                    $this->session->set_flashdata('feedback', 'Successfully Added');
                    #redirect("leave/Holidays");
                    echo "Successfully Added";
                
            
        } else {
            redirect(base_url(), 'refresh');
        }
    }
  
    public function jobvalueDelet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id      = $this->input->get('id');
            $success = $this->customer_model->DeletJob($id);
            echo "Successfully Deletd";
        } else {
            redirect(base_url(), 'refresh');
        }
    }   
     public function jvalueDelet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id      = $this->input->get('id');
            $success = $this->customer_model->Deletjobcard($id);
            echo "Successfully Deletd";
        } else {
            redirect(base_url(), 'refresh');
        }
    }
      public function moodelbyib()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id  = $this->input->get('id');
            $data['modelvalue'] = $this->customer_model->GetModelValue($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    
      public function invoiceview(){

        if($this->session->userdata('user_login_access') != False) {

        $id = base64_decode($this->input->get('I'));

        $data['basic'] = $this->customer_model->GetBasic($id);

        $data['vehicle'] = $this->customer_model->GetAlldisVehInfo();

        $data['invoice'] = $this->customer_model->GetAllinvoiceInfo($id);

        $this->load->view('backend/customer/invoiceview',$data);

        }

    else{

        redirect(base_url() , 'refresh');

    }         

    }
    
     public function vehbyib()

    {

        if ($this->session->userdata('user_login_access') != False) {

            $id  = $this->input->get('id');

            $data['modelvalue'] = $this->customer_model->GetVValue($id);
         

            echo json_encode($data);

        } else {

            redirect(base_url(), 'refresh');

        }

    }



    public function Add_single_Invoice()

    {

 

        if ($this->session->userdata('user_login_access') != False) {

            $id      = $this->input->post('id');

            $cid      = $this->input->post('cid');

            $vehicle_id    = $this->input->post('vehicle_id');

            $model    = $this->input->post('model');

            // $number_plate    = $this->input->post('number_plate');

            $amount    = $this->input->post('amount');

            $service_type    = $this->input->post('service_type');

            $inov_num    = $this->input->post('inov_num');
             $created_by    = $this->input->post('created_by');

            if (empty($id)) {

            $inov_num = rand(1000,2000); 

            }else{

                $inov_num    = $this->input->post('inov_num');

            }

               

                $data = array(

                    'cid' => $cid,

                    'vehicle_id' => $vehicle_id,

                    'model' => $model,

                    // 'number_plate' => $number_plate,

                    'amount' => $amount,

                    'inov_num' => $inov_num,

                    'service_type' => $service_type,
                     'created_by' => $created_by,

          

                );

              

                if (empty($id)) {

                    $success = $this->customer_model->Add_InvoiceInfo($data);

                    $this->session->set_flashdata('feedback', 'Successfully Added');

                    echo "Successfully Added";

                } else {

                    $success = $this->customer_model->Update_InvoiceInfo($id, $data);

                    $this->session->set_flashdata('feedback', 'Successfully Updated');

                    echo "Successfully Updated";

                }

                

            

        } else {

            redirect(base_url(), 'refresh');

        }

    }



    public function Invoicebyib()

    {

        if ($this->session->userdata('user_login_access') != False) {

            $id  = $this->input->get('id');

            $data['rolevalue'] = $this->customer_model->Invoicebyib($id);

            echo json_encode($data);

        } else {

            redirect(base_url(), 'refresh');

        }

    }





    public function viewinvoice()

    {

        if ($this->session->userdata('user_login_access') != False) {

            $posid      = $this->input->get('id');

            $id = base64_decode($this->input->get('I'));       

            $data['basic'] = $this->customer_model->GetBasic($id);

            // $data['vehicle'] = $this->customer_model->GetAllVehInfo();

             $data['pos'] = $this->customer_model->GetAllinovInfo($posid);

            // print_r($data['pos']);die;

            $this->load->view('backend/customer/viewinvoice', $data);

        } else {

            redirect(base_url(), 'refresh');

        }

    }

     public function jobcard_invoice(){
        if($this->session->userdata('user_login_access') != False) {
        $id = base64_decode($this->input->get('I'));
          $jobcardid      = $this->input->get('id');
        $data['basic'] = $this->customer_model->GetBasic($id);
        // $data['pos'] = $this->customer_model->GetPos($id);
          $data['jobcard'] = $this->customer_model->GetJobcardInfo($jobcardid);
            $data['jobcard_item'] = $this->customer_model->GetJobcard_item($jobcardid);
        // $data['total'] = $this->customer_model->GetTotal($id);
        // $data['vehicle'] = $this->customer_model->GetAllVehInfo();
      
        $this->load->view('backend/customer/jobcard_invoice',$data);
        }
    else{
        redirect(base_url() , 'refresh');
    }         
    }
    
      public function gatepass(){
        if($this->session->userdata('user_login_access') != False) {
         $id = base64_decode($this->input->get('I'));
          $jobcardid      = $this->input->get('id');
        $data['basic'] = $this->customer_model->GetBasic($id);
        // $data['pos'] = $this->customer_model->GetPos($id);
          $data['jobcard'] = $this->customer_model->GetJobcardInfo($jobcardid);
            $data['jobcard_item'] = $this->customer_model->GetJobcard_item($jobcardid);
        // $data['total'] = $this->customer_model->GetTotal($id);
        // $data['vehicle'] = $this->customer_model->GetAllVehInfo();
        $this->load->view('backend/customer/gatepass',$data);
        }
    else{
        redirect(base_url() , 'refresh');
    }         
    }
    
     public function jobcard_View(){
        if($this->session->userdata('user_login_access') != False) {
        $id = base64_decode($this->input->get('I'));
          $jobcardid      = $this->input->get('id');
        $data['basic'] = $this->customer_model->GetBasic($id);
        // $data['pos'] = $this->customer_model->GetPos($id);
          $data['jobcard'] = $this->customer_model->GetJobcardInfo($jobcardid);
            $data['jobcard_item'] = $this->customer_model->GetJobcard_item($jobcardid);
        // $data['total'] = $this->customer_model->GetTotal($id);
        // $data['vehicle'] = $this->customer_model->GetAllVehInfo();
      
        $this->load->view('backend/customer/jobcard_view',$data);
        }
    else{
        redirect(base_url() , 'refresh');
    }         
    }
    
}
