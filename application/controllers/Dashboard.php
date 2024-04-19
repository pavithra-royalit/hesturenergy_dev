 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Dhaka');
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('dashboard_model'); 
        $this->load->model('employee_model');
        $this->load->model('settings_model');   
          $this->load->model('pos_model');
       
    }
    
	public function index()
	{
		#Redirect to Admin dashboard after authentication
        if ($this->session->userdata('user_login_access') == 1)
            redirect('dashboard/Dashboard');
            $data=array();
            #$data['settingsvalue'] = $this->dashboard_model->GetSettingsValue();
			$this->load->view('login');
	}
	
	
	
	public function Dashboard()
    {
        if ($this->session->userdata('user_login_access') != False) {
   
            $data['pos'] = $this->pos_model->GetAllPosInfo();
            
               $data['employee'] = $this->employee_model->emselect();
            $this->load->view('backend/dashboard', $data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
	
  
  
    
}