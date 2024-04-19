<?php
ob_start();
error_reporting(0);
	class Attendance_model extends CI_Model{


	function __consturct(){
	parent::__construct();
	
	}

	
    public function emselect(){
    $sql = "SELECT * FROM `attendance` ";
    $query=$this->db->query($sql);
  	$result = $query->result();
  	return $result;
	}
    public function Add($data){
        $this->db->insert('attendance',$data);
    }
   
    public function GetBasic($id){
        $sql = "SELECT *
        FROM `attendance`
        
        WHERE `id`='$id'";
          $query=$this->db->query($sql);
          $result = $query->row();
          return $result;          
      }
      public function Update($data,$id){
		$this->db->where('id', $id);
		$this->db->update('attendance',$data);        
    }
    public function DeletApply($id){
        $this->db->delete('attendance',array('id'=> $id));
    }
  public function attenreport($date_from,$date_to,$emid){

        $Criteriaemid='';
        if ($emid!="") {  $Criteriaemid="  AND employees='$emid' "; }
        
        // $CriteriaYear='';
        // if ($date_from!="") {  $CriteriaYear="WHERE attendance_date BETWEEN '$date_from' AND '$date_to'"; }


         $sql = "SELECT * FROM `attendance`   WHERE attendance_date BETWEEN '$date_from' AND '$date_to'  $Criteriaemid";

      
        $query=$this->db->query($sql);
          $result = $query->result();
          return $result;
        }
        public function emreportselect(){
            $sql = "SELECT DISTINCT(fullname) FROM `staff` ";
            $query=$this->db->query($sql);
              $result = $query->result();
              return $result;
            }


            public function leaveselect(){
              $sql = "SELECT * FROM `leave_type` ";
              $query=$this->db->query($sql);
              $result = $query->result();
              return $result;
            }



            public function getattendance_data($from_date,$to_date) {
        
              $this->db->select('a.*,e.*,a.attendance_status as a_status,a.id as a_id');
              $this->db->from("attendance a");
              $this->db->join("staff e", 'a.user_id = e.id', 'left');
              $this->db->where('a.attendance_date>=', $from_date);
              $this->db->where('a.attendance_date<=', $to_date);
                             
              $this->db->order_by('a.id', 'DESC');
             
              return  $this->db->get()->result();
              //echo $this->db->last_query();die;
              
          }


            public function get_month_attendance_data($search_month){
              
              $sql="select * from staff where status='ACTIVE'";
                         
             
              $query = $this->db->query($sql);
              $rresult =  $query->result_array();
              $final_empl = array();
             
              foreach($rresult as $res){
                // echo $res['id'];die;
                  $empl_names = $this->get_tables_names('staff','id',$res['id']);
                  // echo "<pre>";print_r($empl_names);die;          
                  $atte = $this->get_datewise_data($search_month,$res['id']);
               //   echo "<pre>";  print_r($atte);die;          
                  $final_one['attendance'] = $atte;
                  $final_one['empl_name'] =  $empl_names['fullname'];
                  $final_one['empl_email'] =  $empl_names['email'];
                  $final_empl[] = $final_one;
              }
              // echo "<pre>";print_r($atte);die;
              //echo "<pre>";print_r($final_empl);die;
              return $final_empl;
          }

          function get_datewise_data($search_month, $user_id){
            // echo $search_month;die;
       
            $myYearMonth = $search_month;
            // echo $myYearMonth;die;
     
            $start = new DateTime(date('Y-m-01', strtotime($myYearMonth)));
            // echo $start;die;
          
            $end = new DateTime(date('Y-m-t', strtotime($myYearMonth)));
        
            $diff = DateInterval::createFromDateString('1 day');
            // print_r($start);die;
           
            $periodStart = new DatePeriod($start, $diff, $end);
            // print_r($periodStart);die;
     
            foreach ( $periodStart as $dayDate ){
              
                $ddate[]= $dayDate->format( "d\n" ).'-'.substr($dayDate->format( "l\n" ), 0, 3);
                $sundate[] = $dayDate->format( "l\n" );
                $psearch_date = date("d-m-Y", strtotime($myYearMonth.'-'.$dayDate->format( "d\n" )));
                $search_date[] = $psearch_date;
                // echo "<pre>";print_r($search_date);die;
               
            }
            
            $list=array();
            $split_data = explode('-',$search_month);
            $month_1 = $split_data[0];
            $year_1 = $split_data[1];
            for($d=1; $d<=31; $d++)
            {
                $time=mktime(12, 0, 0, $month_1, $d, $year_1);       
                if (date('m', $time)==$month_1)       
                    $list[]=date('Y-m-d', $time);
            }
            $search_date = $list;
             // echo "<pre>";print_r($search_date);die;
            //echo cal_days_in_month(CAL_GREGORIAN,1,2021);die;
            //echo "<pre>";print_r($ddate);die;
            for($i=0;$i<count($search_date);$i++){
              $get_attendance= $this->get_attendance($user_id,$search_date[$i]);
           
               $get_attendance['status'] =  ($get_attendance['a_status']) ? substr($get_attendance['a_status'], 0, 1) : '-';
          $today = date('d-m-Y');
                    
              $get_attendance['days'] =$sundate[$i];
              $get_attendance['month_date'] =  $ddate[$i];
              $final_res[] = $get_attendance;
              //  echo "<pre>";print_r($sundate[$i]);
          }
            // die;
            return $final_res;
        //  echo "<pre>";print_r($final_res);die;
        }

          function get_tables_names($table,$param,$value)
          {
      
            $sql="select * from $table where $param='$value'";
            $query = $this->db->query($sql);
            return $query->row_array();
          }

        
     
          
          function get_attendance($user_id,$date){
            // echo $date;die;
            
             $sql="select *,attendance_status as a_status from attendance where user_id='$user_id' and attendance_date='$date'";
                  //echo "<pre>";print_r($sql);die;
                $query = $this->db->query($sql);
                $result = $query->row_array();
            return $result;
          }
          
    }
?>