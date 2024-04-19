<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model');
        $this->load->model('employee_model');
        $this->load->model('holiday_model');
        $this->load->model('settings_model');
    }

    public function index()
	{
		if ($this->session->userdata('user_login_access') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('user_login_access') == 1)
          $data= array();
        redirect('holiday/Holidays');
	}
    
    public function Holidays()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data['holidays'] = $this->holiday_model->GetAllHoliInfo();
            $this->load->view('backend/holiday', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function Add_Holidays()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id      = $this->input->post('id');
            $name    = $this->input->post('holiname');
            $sdate   = $this->input->post('startdate');
            $edate   = $this->input->post('enddate');
            if(empty($edate)){
               $nofdate = '1'; 
                //die($nofdate);
            } else{
            $date1 = new DateTime($sdate);
            $date2 = new DateTime($edate);
            $diff = date_diff($date1,$date2);
            $nofdate = $diff->format("%a");
            //die($nofdate);     
            }
            $year    = date('m-Y',strtotime($sdate));
            $this->form_validation->set_error_delimiters();
            $this->form_validation->set_rules('holiname', 'Holidays name', 'trim|required|min_length[5]|max_length[120]|xss_clean');
            
            if ($this->form_validation->run() == FALSE) {
                echo validation_errors();
                #redirect("leave/Holidays");
            } else {
                $data = array();
                $data = array(
                    'holiday_name' => $name,
                    'from_date' => $sdate,
                    'to_date' => $edate,
                    'number_of_days' => $nofdate,
                    'year' => $year
                );
                if (empty($id)) {
                    $success = $this->holiday_model->Add_HolidayInfo($data);
                    $this->session->set_flashdata('feedback', 'Successfully Added');
                    #redirect("leave/Holidays");
                    echo "Successfully Added";
                } else {
                    $success = $this->holiday_model->Update_HolidayInfo($id, $data);
                    $this->session->set_flashdata('feedback', 'Successfully Updated');
                    #redirect("leave/Holidays");
                    echo "Successfully Updated";
                }
                
            }
        } else {
            redirect(base_url(), 'refresh');
        }
    }

     

    public function Holidaybyib()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id                   = $this->input->get('id');
            $data['holidayvalue'] = $this->holiday_model->GetLeaveValue($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function HOLIvalueDelet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id      = $this->input->get('id');
            $success = $this->holiday_model->DeletHoliday($id);
            echo "Successfully Deletd";
        } else {
            redirect(base_url(), 'refresh');
        }
    }


}
