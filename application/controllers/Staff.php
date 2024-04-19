<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

       function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('dashboard_model');
        $this->load->model('staff_model');
        $this->load->model('login_model');
        $this->load->model('settings_model');
        $this->load->model('employee_model');
        $this->load->model('shift_model');
    }
    
	public function index()
	{
		if ($this->session->userdata('user_login_access') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('user_login_access') == 1)
          $data= array();
        redirect('staff/Staffs');
	}
    public function Staffs(){
        if($this->session->userdata('user_login_access') != False) { 
            
              $created_date = $this->input->post('created_date');  
        $data['created_date'] = $this->input->post('created_date');  
      
        $data['staff'] = $this->staff_model->staffselect($created_date);
        
       // $data['staff'] = $this->staff_model->emselect();
        $this->load->view('backend/staff/staff',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Add_staff(){
        if($this->session->userdata('user_login_access') != False) { 
        $this->load->view('backend/staff/add-staff');
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
	public function Save(){ 
        if($this->session->userdata('user_login_access') != False) {       
        $fullname = $this->input->post('fullname');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');      
        $location = $this->input->post('location');	   
        $address = $this->input->post('address');	    
        $shift_name = $this->input->post('shift_name');	 
        // $username = $this->input->post('username');	
        // $password1 = $this->input->post('password');
        // $password = sha1($password1);	
        $created_date = date('Y-m-d');
        $data = array(
            'fullname' => $fullname,
            'email' => $email,
            'phone' => $phone,
            'location'=>$location,
            'address'=>$address,
            'shift_name'=>$shift_name,
            'created_date'=>$created_date,
            // 'username'=>$username,
            // 'password'=>$password
            
           
        );
        $success = $this->staff_model->Add($data);
        echo "Employee details Successfully Added";       
        }
            }
            public function view(){
                if($this->session->userdata('user_login_access') != False) {
                $id = base64_decode($this->input->get('I'));
                $data['basic'] = $this->staff_model->GetBasic($id);
                 $data['fileinfo'] = $this->staff_model->GetFileInfo($id);
                $this->load->view('backend/staff/staff_view',$data);
                }
            else{
                redirect(base_url() , 'refresh');
            }         
            }
            public function Update(){
              
                if($this->session->userdata('user_login_access') != False) {    
                $id = $this->input->post('emid');     
                $fullname = $this->input->post('fullname');
                $email = $this->input->post('email');
                $phone = $this->input->post('phone');      
                $location = $this->input->post('location');	   
                $address = $this->input->post('address');	    
                // $username = $this->input->post('username');	
                $status = $this->input->post('status');	
                $shift_name = $this->input->post('shift_name');	 
                $data = array(
                    'fullname' => $fullname,
                    'email' => $email,
                    'phone' => $phone,
                    'location'=>$location,
                    'address'=>$address,
                    // 'username'=>$username,
                    'status'=>$status,
                    'shift_name'=>$shift_name,
                   
                );
            if($id){
                $success = $this->staff_model->Update($data,$id); 
                $this->session->set_flashdata('feedback','Successfully Updated');
                echo "Employee details Successfully Updated";
                    }
            
                }
                    }

                    public function staffvalueDelet(){
                        if($this->session->userdata('user_login_access') != False) {  
                        $id= $this->input->get('id');
                        $success = $this->staff_model->DeletApply($id);
                        echo "Successfully Deletd";
                        }
                    else{
                        redirect(base_url() , 'refresh');
                    } 
                    }
                    


    public function Add_File(){
        if($this->session->userdata('user_login_access') != False) { 
        $em_id = $this->input->post('em_id');    		
        $filetitle = $this->input->post('title');    		
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters();
            $this->form_validation->set_rules('title', 'title', 'trim|required|min_length[10]|max_length[120]|xss_clean');
    
            if ($this->form_validation->run() == FALSE) {
                echo validation_errors();
                
                } else {
                if($_FILES['file_url']['name']){
                $file_name = $_FILES['file_url']['name'];
                $fileSize = $_FILES["file_url"]["size"]/1024;
                $fileType = $_FILES["file_url"]["type"];
                $new_file_name='';
                $new_file_name .= $file_name;
    
                $config = array(
                    'file_name' => $new_file_name,
                    'upload_path' => "./assets/images/users",
                    'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|docx|xml|text|txt",
                    'overwrite' => False,
                    'max_size' => "40480000"
                );
        
                $this->load->library('Upload', $config);
                $this->upload->initialize($config);                
                if (!$this->upload->do_upload('file_url')) {
                    echo $this->upload->display_errors();
                    #redirect("employee/view?I=" .base64_encode($em_id));
                }
       
                else {
                    $path = $this->upload->data();
                    $img_url = $path['file_name'];
                    $data = array();
                    $data = array(
                        'em_id' => $em_id,
                        'file_title' => $filetitle,
                        'file_url' => $img_url
                    );
                $success = $this->staff_model->File_Upload($data); 
                #$this->session->set_flashdata('feedback','Successfully Updated');
                #redirect("staff/view?I=" .base64_encode($em_id));
                    echo "Employee Documents Successfully Updated";
                }
            }
                
            }
            }
        else{
            redirect(base_url() , 'refresh');
        }        
        }            
                    
     public function docvalueDelet(){
        if($this->session->userdata('user_login_access') != False) {  
        $id= $this->input->get('id');
        $success = $this->staff_model->DeletDOC($id);
        echo "Successfully Deletd";
        }
    else{
        redirect(base_url() , 'refresh');
    } 
    }
        
}