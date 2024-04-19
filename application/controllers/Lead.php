<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead extends CI_Controller {

       function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('dashboard_model');
        $this->load->model('employee_model');
        $this->load->model('login_model');
        $this->load->model('settings_model');
        $this->load->model('lead_model');
    }
    
	public function index()
	{
		if ($this->session->userdata('user_login_access') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('user_login_access') == 1)
          $data= array();
        redirect('lead/Leads');
	}
    public function Leads(){
        if($this->session->userdata('user_login_access') != False) { 
             $created_date = $this->input->post('created_date');  
        $data['created_date'] = $this->input->post('created_date');  
      
        $data['lead'] = $this->lead_model->leadselect($created_date);
        $this->load->view('backend/sales/leads',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }

    public function Add_lead(){
        if($this->session->userdata('user_login_access') != False) { 
        $this->load->view('backend/sales/add-lead');
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
	public function Save(){ 
        if($this->session->userdata('user_login_access') != False) {       
        $lead_from = $this->input->post('lead_from');
        $fname = $this->input->post('fname');
        $mobile = $this->input->post('mobile');
        $email = $this->input->post('email');      
        $follow_up_date = $this->input->post('follow_up_date');	   
        $status = $this->input->post('status');	    
        $address = $this->input->post('address');
        $created_date = date('Y-m-d');
        $data = array(
            'lead_from' => $lead_from,
            'fname' => $fname,
            'mobile' => $mobile,
            'email'=>$email,
            'follow_up_date'=>$follow_up_date,
            'status_id'=>$status,
            'address'=>$address,
            'created_date'=>$created_date,
           
        );
        $success = $this->lead_model->Add($data);
        echo "Lead details Successfully Added";       
        }
            }

            public function view(){
                if($this->session->userdata('user_login_access') != False) {
                $id = base64_decode($this->input->get('I'));
                $data['basic'] = $this->lead_model->GetBasic($id);
                $this->load->view('backend/sales/lead_view',$data);
                }
            else{
                redirect(base_url() , 'refresh');
            }         
            }

            public function Update(){
              
                if($this->session->userdata('user_login_access') != False) {    
                $id = $this->input->post('emid');     
                $lead_from = $this->input->post('lead_from');
                $fname = $this->input->post('fname');
                $mobile = $this->input->post('mobile');
                $email = $this->input->post('email');      
                $follow_up_date = $this->input->post('follow_up_date');	   
                $status = $this->input->post('status');	 
                $address = $this->input->post('address');	   
            
                $data = array(
                    'id' => $id,
                    'lead_from' => $lead_from,
                    'fname' => $fname,
                    'mobile' => $mobile,
                    'email'=>$email,
                    'follow_up_date'=>$follow_up_date,
                    'status_id'=>$status,
                    'address'=>$address
                   
                );
      
            if($id){
                $success = $this->lead_model->Update($data,$id); 
                $this->session->set_flashdata('feedback','Successfully Updated');
                echo "Lead details Successfully Updated";
                    }
            
                }
                    }

                      public function leadvalueDelet(){
                        if($this->session->userdata('user_login_access') != False) {  
                        $id= $this->input->get('id');
                        $success = $this->lead_model->DeletApply($id);
                        echo "Successfully Deletd";
                        }
                    else{
                        redirect(base_url() , 'refresh');
                    } 
                    }

                    public function lead_view(){
                        if($this->session->userdata('user_login_access') != False) {
                        $id = base64_decode($this->input->get('I'));
                        $data['basic'] = $this->lead_model->GetBasic($id);
                        $data['notes'] = $this->lead_model->GetNotes($id);
                        $this->load->view('backend/sales/lead_timeline',$data);
                        }
                    else{
                        redirect(base_url() , 'refresh');
                    }         
                    }

                    public function Add_notes(){
                        if($this->session->userdata('user_login_access') != False) {
                        $id = $this->input->post('id');
                        $em_id = $this->input->post('emid');
                        $notes = $this->input->post('notes');
                                       
                     
                            $data = array();
                                $data = array(
                                    'emp_id' => $em_id,
                                    'notes' => $notes,
                                  
                                );
                            if(empty($id)){
                                $success = $this->lead_model->Add_notes($data);
                                $this->session->set_flashdata('feedback','Successfully Added');
                                echo "Successfully Updated";
                            } else {
                                $success = $this->lead_model->Update_notes($id,$data);
                                #$this->session->set_flashdata('feedback','Successfully Updated');
                                echo "Successfully Updated";
                            }
                                       
                        
                        }
                    else{
                        redirect(base_url() , 'refresh');
                    }        
                    }
                    public function notesbyib(){
                        if($this->session->userdata('user_login_access') != False) {  
                        $id= $this->input->get('id');
                        $data['notesvalue'] = $this->lead_model->GetExpValue($id);
                        echo json_encode($data);
                        }
                    else{
                        redirect(base_url() , 'refresh');
                    } 
                        
                    }
                    public function notesvalueDelet(){
                        if($this->session->userdata('user_login_access') != False) {  
                        $id= $this->input->get('id');
                        $success = $this->lead_model->DeletEXP($id);
                        echo "Successfully Deletd";
                        }
                    else{
                        redirect(base_url() , 'refresh');
                    } 
                    }

                    function ajax_update(){
                      
                        if($this->session->userdata('user_login_access') != False) {  
                        $lead_id = $this->input->post('lead_id');
                        $status_id = $this->input->post('status_id');
                        $updateData = [
                            'status_id' => $status_id
                        ];
                        $success = $this->lead_model->Updatelead($lead_id,$updateData);
                    
                        echo 1;
                    }
                    else{
                        redirect(base_url() , 'refresh');
                    } 
                    }
        
}