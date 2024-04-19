<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {

       function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('dashboard_model');
        $this->load->model('attendance_model');
        $this->load->model('login_model');
        $this->load->model('settings_model');
        $this->load->model('employee_model');
        $this->load->model('staff_model');
    }
    
	public function index()
	{
		if ($this->session->userdata('user_login_access') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('user_login_access') == 1)
          $data= array();
        redirect('attendance/Attendances');
	}
    public function Attendances(){
        if($this->session->userdata('user_login_access') != False) { 
        $data['attendance'] = $this->attendance_model->emselect();
        $this->load->view('backend/attendance/attendance',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Add_attendance(){
        if($this->session->userdata('user_login_access') != False) { 
        $this->load->view('backend/attendance/add-attendance');
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
	public function Save(){ 
	 
        if($this->session->userdata('user_login_access') != False) {       
        $employees = $this->input->post('employees');
        $attendance_type = $this->input->post('attendance_type');
        $attendance_date = $this->input->post('attendance_date');      
        $attendance_status = $this->input->post('attendance_status');	   
        $created_date = date('d-m-Y');
     
        $employees     = $this->input->post('employees[]');
        foreach ($employees as $dataarray) {
            $data    = array();
            $data    = array(
                'user_id' => $dataarray,
                'attendance_type' => $attendance_type,
                'attendance_date' => $attendance_date,
                'attendance_status'=>$attendance_status,
                'created_date'=>$created_date,
            );
    
    
        $success = $this->attendance_model->Add($data);
        }
        echo "Addendance Successfully Added";       
        }
            }
            public function view(){
                if($this->session->userdata('user_login_access') != False) {
                $id = base64_decode($this->input->get('I'));
                $data['basic'] = $this->attendance_model->GetBasic($id);
                $this->load->view('backend/attendance/attendance_view',$data);
                }
            else{
                redirect(base_url() , 'refresh');
            }         
            }
            public function Update(){
              
                if($this->session->userdata('user_login_access') != False) {    
                $id = $this->input->post('emid');     
                  $employees = $this->input->post('employees');
                $attendance_type = $this->input->post('attendance_type');
                $attendance_date = $this->input->post('attendance_date');      
                $attendance_status = $this->input->post('attendance_status');	  
                $data = array(
                      'employees' => $employees,
                    'attendance_type' => $attendance_type,
                    'attendance_date' => $attendance_date,
                    'attendance_status'=>$attendance_status
                   
                );
            if($id){
                $success = $this->attendance_model->Update($data,$id); 
                $this->session->set_flashdata('feedback','Successfully Updated');
                echo "Attendance details Successfully Updated";
                    }
            
                }
                    }

                    public function attanvalueDelet(){
                        if($this->session->userdata('user_login_access') != False) {  
                        $id= $this->input->get('id');
                        $success = $this->attendance_model->DeletApply($id);
                        echo "Successfully Deletd";
                        }
                    else{
                        redirect(base_url() , 'refresh');
                    } 
                    }
                public function Attendance_Report()
                    {
                        if($this->session->userdata('user_login_access') != False) {

                            $data['from_date'] = ($this->input->post('from_date')) ? Date('d-m-Y',strtotime($this->input->post('from_date'))) : date('d-m-Y');
                            $data['to_date'] = ($this->input->post('to_date')) ? Date('d-m-Y',strtotime($this->input->post('to_date'))) : date('d-m-Y');
                        //    echo $_POST['search_month'];die;
                            $data['attendance_menu'] = true;
                            $data['attendance_data'] = $this->attendance_model->getattendance_data($data['from_date'],$data['to_date']);
                            //  echo "<pre>";print_r($data['attendance_data']);die;
                             
                            $search_month = $this->input->post('search_month');
                            $data['from_date'] = $_POST['from_date'];
                            $data['to_date'] = $_POST['to_date'];
                    
                      //      $data['holidays'] = $this->db->select('*')->from('tbl_holidays')->get()->result();
                            // echo $search_month;die;
                            if($search_month!=''){		
                                
                            $data['search_month'] = $_POST['search_month'];
                            
                                $data['monthattendance_data'] = $this->attendance_model->get_month_attendance_data($search_month);
                                // echo "<pre>";print_r($data['monthattendance_data']);die;
                                $this->load->view('backend/attendance/attendance_report',$data);
                            }else{
                                $this->load->view('backend/attendance/attendance_report',$data);
                            }

                        }
                        else{
                            redirect(base_url() , 'refresh');
                        }  

                    }
        
}