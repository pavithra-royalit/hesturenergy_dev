<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model');
        $this->load->model('employee_model');
        $this->load->model('role_model');
        $this->load->model('settings_model');
    }

    public function index()
	{
		if ($this->session->userdata('user_login_access') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('user_login_access') == 1)
          $data= array();
        redirect('role/Roles');
	}
    
    public function Roles()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $data['roles'] = $this->role_model->GetAllRolInfo();
            $this->load->view('backend/role', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function Add_Roles()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id      = $this->input->post('id');
            $role    = $this->input->post('role');

           
               
                $data = array(
                    'role' => $role
                  
                );
                if (empty($id)) {
                    $success = $this->role_model->Add_RoleInfo($data);
                    $this->session->set_flashdata('feedback', 'Successfully Added');
                    echo "Successfully Added";
                } else {
                    $success = $this->role_model->Update_RoleInfo($id, $data);
                    $this->session->set_flashdata('feedback', 'Successfully Updated');
                    echo "Successfully Updated";
                }
                
            
        } else {
            redirect(base_url(), 'refresh');
        }
    }

     

    public function Rolebyib()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id  = $this->input->get('id');
            $data['rolevalue'] = $this->role_model->GetLeaveValue($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function ROLEvalueDelet()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id      = $this->input->get('id');
            $success = $this->role_model->DeletRole($id);
            echo "Successfully Deletd";
        } else {
            redirect(base_url(), 'refresh');
        }
    }


}
