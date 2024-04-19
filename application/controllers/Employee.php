<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

       function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('dashboard_model');
        $this->load->model('employee_model');
        $this->load->model('login_model');
        $this->load->model('settings_model');
    }
    
	public function index()
	{
		if ($this->session->userdata('user_login_access') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('user_login_access') == 1)
          $data= array();
        redirect('employee/Employees');
	}
    public function Employees(){
        if($this->session->userdata('user_login_access') != False) { 
        $data['employee'] = $this->employee_model->emselect();
        $this->load->view('backend/dealers/employees',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Add_employee(){
        if($this->session->userdata('user_login_access') != False) { 
        $this->load->view('backend/dealers/add-employee');
        }
    else{
		redirect(base_url() , 'refresh');
	}            
    }
	public function Save(){ 
    if($this->session->userdata('user_login_access') != False) {       
    $id = $this->input->post('emid');    
	$fname = $this->input->post('fname');
	$lname = $this->input->post('lname');
    $emrand = substr($lname,0,3).rand(1000,2000);    
	$role = "DEALER";
	$gender = $this->input->post('gender');
	$contact = $this->input->post('contact');
	
	$gst = $this->input->post('gst');	
	$address = $this->input->post('address');	


	$password1 = $this->input->post('password');	
	$email = $this->input->post('email');	
	$password = sha1($password1);	
	$confirm = $this->input->post('confirm');	

    $data = array(
        'em_id' => $emrand,
        'first_name' => $fname,
        'last_name' => $lname,
        'em_email' => $email,
        'em_password'=>$password,
        'em_role'=>$role,
        'em_gender'=>$gender,
        'status'=>'ACTIVE',
        'em_phone'=>$contact,
        'em_gst'=>$gst,
         'address'=>$address
       
    );
    $success = $this->employee_model->Add($data);
    echo "Dealer details Successfully Added";       
    }
		}
	public function Update(){
    if($this->session->userdata('user_login_access') != False) {    
    $id = $this->input->post('emid');     
	$fname = $this->input->post('fname');
	$lname = $this->input->post('lname');	
	$role = "DEALER";
	$gender = $this->input->post('gender');
	$contact = $this->input->post('contact');	
	$gst = $this->input->post('gst');	
	//$username = $this->input->post('username');	
	$email = $this->input->post('email');	
	$password = $this->input->post('password');	
	$confirm = $this->input->post('confirm');	
	$status = $this->input->post('status');	
		$address = $this->input->post('address');
    	

    $data = array(
    'em_id' => $id,
    'first_name' => $fname,
    'last_name' => $lname,
    'em_email' => $email,
    'em_role'=>$role,
    'em_gender'=>$gender,
    'status'=>$status,
    'em_phone'=>$contact,
    'em_gst'=>$gst,
         'address'=>$address
  
);
if($id){
    $success = $this->employee_model->Update($data,$id); 
    $this->session->set_flashdata('feedback','Successfully Updated');
    echo "Dealer details Successfully Updated";
        }

    }
		}


    public function view(){
        if($this->session->userdata('user_login_access') != False) {
        $id = base64_decode($this->input->get('I'));
        $data['basic'] = $this->employee_model->GetBasic($id);
        $data['fileinfo'] = $this->employee_model->GetFileInfo($id);
        $this->load->view('backend/dealers/employee_view',$data);
        }
    else{
		redirect(base_url() , 'refresh');
	}         
    }


    public function Add_File(){
        if($this->session->userdata('user_login_access') != False) { 
              $id      = $this->input->post('id');
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
                    
                      if (empty($id)) {
                    $success = $this->employee_model->File_Upload($data); 
                    $this->session->set_flashdata('feedback', 'Successfully Added');
                    echo "Successfully Added";
                } else {
                    $success = $this->employee_model->Update_FileInfo($id, $data);
                    $this->session->set_flashdata('feedback', 'Successfully Updated');
                    echo "Successfully Updated";
                }
                
                    
                
                }
            }
                
            }
            }
        else{
            redirect(base_url() , 'refresh');
        }        
        }


	public function document_approval(){ 
    if($this->session->userdata('user_login_access') != False) {       
    $status = $this->input->post('doc_status');    
     $id  = $this->input->post('em_id');    

    $data = array(
       'em_id' => $id,
        'doc_status' => $status,
    );

  
    $success = $this->employee_model->doc_approval($data,$id); 
  if($status =='1'){
    echo "Request has been successfully sent to the administrator for approval";
  }else if($status == '2'){
        echo "Request has been successfully Approved";
  }else if($status == '3'){
        echo "Request has been Rejected";
  }
 
   
    }
		}
		
    public function Reset_Password_Hr(){
        if($this->session->userdata('user_login_access') != False) {
        $id = $this->input->post('emid');
        $onep = $this->input->post('new1');
        $twop = $this->input->post('new2');
            if($onep == $twop){
                $data = array();
                $data = array(
                    'em_password'=> sha1($onep)
                );
        $success = $this->employee_model->Reset_Password($id,$data);
        #$this->session->set_flashdata('feedback','Successfully Updated');
        #redirect("employee/view?I=" .base64_encode($id));
                echo "Successfully Updated";
            } else {
        $this->session->set_flashdata('feedback','Please enter valid password');
        #redirect("employee/view?I=" .base64_encode($id)); 
                echo "Please enter valid password";
            }

        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }
    public function Reset_Password(){
        if($this->session->userdata('user_login_access') != False) {
        $id = $this->input->post('emid');
        $oldp = sha1($this->input->post('old'));
        $onep = $this->input->post('new1');
        $twop = $this->input->post('new2');
        $pass = $this->employee_model->GetEmployeeId($id);
        if($pass->em_password == $oldp){
            if($onep == $twop){
                $data = array();
                $data = array(
                    'em_password'=> sha1($onep)
                );
        $success = $this->employee_model->Reset_Password($id,$data);
        $this->session->set_flashdata('feedback','Successfully Updated');
        #redirect("employee/view?I=" .base64_encode($id));
                echo "Successfully Updated";
            } else {
        $this->session->set_flashdata('feedback','Please enter valid password');
        #redirect("employee/view?I=" .base64_encode($id));
                echo "Please enter valid password";
            }
        } else {
            $this->session->set_flashdata('feedback','Please enter valid password');
            #redirect("employee/view?I=" .base64_encode($id));
            echo "Please enter valid password";
        }
        }
    else{
		redirect(base_url() , 'refresh');
	}        
    }


	public function confirm_mail_send($email,$pass_hash){
		$config = Array( 
		'protocol' => 'smtp', 
		'smtp_host' => 'ssl://smtp.googlemail.com', 
		'smtp_port' => 465, 
		'smtp_user' => 'mail.imojenpay.com', 
		'smtp_pass' => ''
		); 		  
         $from_email = "imojenpay@imojenpay.com"; 
         $to_email = $email; 
   
         //Load email library 
         $this->load->library('email',$config); 
   
         $this->email->from($from_email, 'Dotdev'); 
         $this->email->to($to_email);
         $this->email->subject('Hr Syatem'); 
		 $message	 =	"Your Login Email:"."$email";
		 $message	.=	"Your Password :"."$pass_hash"; 
         $this->email->message($message); 
   
         //Send mail 
         if($this->email->send()){ 
         	$this->session->set_flashdata('feedback','Kindly check your email To reset your password');
		 }
         else {
         $this->session->set_flashdata("feedback","Error in sending Email."); 
		 }			
	}
    public function Inactive_Employee(){
        $data['invalidem'] = $this->employee_model->getInvalidUser();
        $this->load->view('backend/dealers/invalid_user',$data);
    }
     public function docvalueDelet(){
        if($this->session->userdata('user_login_access') != False) {  
        $id= $this->input->get('id');
        $success = $this->employee_model->DeletDOC($id);
        echo "Successfully Deletd";
        }
    else{
        redirect(base_url() , 'refresh');
    } 
    }
      public function KYCbyib()
    {
        if ($this->session->userdata('user_login_access') != False) {
            $id  = $this->input->get('id');
            $data['rolevalue'] = $this->employee_model->KYCbyib($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }
    
}