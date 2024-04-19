<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Officeshifts extends CI_Controller {

       function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('dashboard_model');
        $this->load->model('employee_model');
        $this->load->model('login_model');
        $this->load->model('settings_model');
        $this->load->model('shift_model');
    }
    
	public function index()
	{
		if ($this->session->userdata('user_login_access') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('user_login_access') == 1)
          $data= array();
        redirect('Officeshifts/Shift');
	}
  
    public function Shift(){
        if($this->session->userdata('user_login_access') != False) { 
        $data['shift'] = $this->shift_model->emselect();
        $this->load->view('backend/staff/officeshift',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }


                    // public function Shift(){
                    //     if($this->session->userdata('user_login_access') != False) {
                    //     $id = base64_decode($this->input->get('I'));
                    //     $data['shift'] = $this->shift_model->GetShift($id);
                    //     $this->load->view('backend/staff/officeshift',$data);
                    //     }
                    // else{
                    //     redirect(base_url() , 'refresh');
                    // }         
                    // }

                    public function Add_shift(){
                        if($this->session->userdata('user_login_access') != False) {
                        $id = $this->input->post('id');
                        $shift_name = $this->input->post('shift_name');
                        $shift_from = $this->input->post('shift_from');
                        $shift_to = $this->input->post('shift_to');
                                       
                     
                            $data = array();
                                $data = array(
                                    'shift_name' => $shift_name,
                                    'shift_from' => $shift_from,
                                    'shift_to' => $shift_to,
                                                                  
                                );
                            if(empty($id)){
                                $success = $this->shift_model->Add_shift($data);
                                $this->session->set_flashdata('feedback','Successfully Added');
                                echo "Successfully Added";
                            } else {
                                $success = $this->shift_model->Update_shift($id,$data);
                                #$this->session->set_flashdata('feedback','Successfully Updated');
                                echo "Successfully Updated";
                            }
                                       
                        
                        }
                    else{
                        redirect(base_url() , 'refresh');
                    }        
                    }
                    public function shiftbyib(){
                        if($this->session->userdata('user_login_access') != False) {  
                        $id= $this->input->get('id');
                        $data['shiftvalue'] = $this->shift_model->GetExpValue($id);
                        echo json_encode($data);
                        }
                    else{
                        redirect(base_url() , 'refresh');
                    } 
                        
                    }
                    public function shiftvalueDelet(){
                        if($this->session->userdata('user_login_access') != False) {  
                        $id= $this->input->get('id');
                        $success = $this->shift_model->DeletEXP($id);
                        echo "Successfully Deletd";
                        }
                    else{
                        redirect(base_url() , 'refresh');
                    } 
                    }

                   
        
}