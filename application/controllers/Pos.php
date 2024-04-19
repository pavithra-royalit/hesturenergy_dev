<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model');
        $this->load->model('employee_model');
        $this->load->model('pos_model');
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
        redirect('pos/Pos');
	}
    
    public function Pos()
    {
        if ($this->session->userdata('user_login_access') != False) {
   
            $data['pos'] = $this->pos_model->GetAllPosInfo();
            
            $this->load->view('backend/pos/pos', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    public function Invoice()
    {
 
   
         if ($this->session->userdata('user_login_access') != False) {
   
            $data['invoice'] = $this->pos_model->GetAllInvoiceInfo();
            
            $this->load->view('backend/pos/invoice', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

       public function Jobcard()
    {
 
   
         if ($this->session->userdata('user_login_access') != False) {
   
            $data['jobcard'] = $this->pos_model->GetAlljobcardInfo();
            
            $this->load->view('backend/pos/jobcard', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    
      public function JCInvoice()
    {
 
   
         if ($this->session->userdata('user_login_access') != False) {
   
            $data['jobcard'] = $this->pos_model->GetAlljobcardInfo();
            
            $this->load->view('backend/pos/JCInvoice', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    public function Gatepass()
    {
 
   
         if ($this->session->userdata('user_login_access') != False) {
   
            $data['jobcard'] = $this->pos_model->GetAlljobcardInfo();
            
            $this->load->view('backend/pos/gatepass', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }


    
}
