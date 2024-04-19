<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model');
        $this->load->model('employee_model');
        $this->load->model('vehicle_model');
        $this->load->model('settings_model');
    }

    public function index()
	{
		if ($this->session->userdata('user_login_access') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('user_login_access') == 1)
          $data= array();
        redirect('Vehicle/Vehicle');
	}
    
    public function Vehicle()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data['vehicle'] = $this->vehicle_model->GetAllVehInfo();
            $this->load->view('backend/vehicle', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    public function Add_Vehicle()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id      = $this->input->post('id');
            $vehicle_name    = $this->input->post('vehicle_name');
            $vehicle_price    = $this->input->post('vehicle_price');
             $gst    = $this->input->post('gst');
            $model          = $this->input->post('model');
            $created_date    = $this->input->post('created_date');

           
               
                $data = array(
                    'vehicle_name' => $vehicle_name,
                    'vehicle_price' => $vehicle_price,
                      'gst' => $gst,
                    'model' => $model
                             
                );
                if (empty($id)) {
                    $success = $this->vehicle_model->Add_VehicleInfo($data);
                    $this->session->set_flashdata('feedback', 'Successfully Added');
                    echo "Successfully Added";
                } else {
                    $success = $this->vehicle_model->Update_VehicleInfo($id, $data);
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
            $data['vehiclevalue'] = $this->vehicle_model->GetLeaveValue($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function VEHvalueDelet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id      = $this->input->get('id');
            $success = $this->vehicle_model->DeletVehicle($id);
            echo "Successfully Deletd";
        } else {
            redirect(base_url(), 'refresh');
        }
    }


}
