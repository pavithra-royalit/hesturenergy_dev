<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<?php
 
$dataPoints = array( 
	array("label"=>"Dealer1", "y"=>44.02),
	array("label"=>"Dealer2", "y"=>25.55),
	array("label"=>"Dealer3", "y"=>50.47),
    array("label"=>"Dealer4", "y"=>30.55),
	
);
  
$dataPoints1 = array( 
	array("label"=>"ShowRoom1", "y"=>44.02),
	array("label"=>"ShowRoom2", "y"=>25.55),
	array("label"=>"ShowRoom3", "y"=>50.47),
    array("label"=>"ShowRoom4", "y"=>30.55),
	
)
?>
<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	// title: {
	// 	text: "Usage Share of Desktop Browsers"
	// },
	// subtitles: [{
	// 	text: "November 2017"
	// }],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	// title: {
	// 	text: "Usage Share of Desktop Browsers"
	// },
	// subtitles: [{
	// 	text: "November 2017"
	// }],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();


var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	// title: {
	// 	text: "Usage Share of Desktop Browsers"
	// },
	// subtitles: [{
	// 	text: "November 2017"
	// }],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();
 
}
</script>
  <?php  $id = $this->session->userdata('user_login_id');
          $basicinfo = $this->employee_model->GetBasic($id); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor fw-bold"> Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>

    
            <div class="container-fluid">
                <?php if($this->session->userdata('user_type')=='DEALER'){ ?>
                
                <!------------- Dealer Dashboard Code start --------------->
                
               <div class="container-fluid">
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo base_url(); ?>employee/Employees">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="fw-bold">Customers</h3>
                                    <div class="d-flex justify-content-between">
                                        <h3 class="fw-bold fs-3 mt-2 text-themecolor">
                                        <?php 
                                            $this->db->where('created_by',$basicinfo->id);
                                            $this->db->from("customer");
                                            echo $this->db->count_all_results();
                                        ?>  </h3>
                                        <div class="round align-self-center round-primary"><i class="ti-user"></i></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo base_url(); ?>pos/Pos">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="fw-bold">PO'S</h3>
                                    <div class="d-flex justify-content-between">
                                        <h3 class="fw-bold fs-3 mt-2 text-themecolor">
                                        <?php 
                                             $this->db->where('created_by',$basicinfo->id);
                                            $this->db->from("quotation");
                                            echo $this->db->count_all_results();
                                        ?>  </h3>
                                        <div class="round align-self-center round-info"><i class="fa fa-shopping-bag"></i></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo base_url(); ?>pos/Invoice">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="fw-bold">Invoices</h3>
                                    <div class="d-flex justify-content-between">
                                        <h3 class="fw-bold fs-3 mt-2 text-themecolor">
                                        <?php 
                                             $this->db->where('created_by',$basicinfo->id);
                                            $this->db->from("invoice");
                                            echo $this->db->count_all_results();
                                        ?>  </h3>
                                           <div class="round align-self-center round-danger"><i class="fa fa-users"></i></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="#">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="fw-bold">Tickets</h3>
                                    <div class="d-flex justify-content-between">
                                        <h3 class="fw-bold fs-3 mt-2 text-themecolor">
                                        0 </h3>
                                           <div class="round align-self-center round-danger"><i class="fa fa-users"></i></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Sales List</h4>
                                 <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                           

                                             <tr>
                                              <th>SNo </th>
                                              <th>Vehicle Name </th>
                                              <th>Model </th>
                                              <th>Number Plate </th>
                                              <!--<th> Price (₹)</th>-->
                                              <!--<th> Qty</th>-->
                                              <th>Total (₹)</th>
                                              <th>Action </th>
                                          </tr>
                                        </thead>
                                      
                                        <tbody>
                                           <?php
                                           $i=1;
                                           foreach($pos as $value){
                                            $pos_code = $value->pos_code;
                                            $sql = "SELECT * FROM `tbl_vehicle`  WHERE id='$value->vehicle_name'";
                                            $query=$this->db->query($sql);
                                            $result = $query->result();       
                                            foreach($result as $value1){ 
                                                $name1=$value1->vehicle_name;
                                             }      
                                            ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo $name1 ?></td>
                                                 <td><?php echo $value->model ?></td>
                                                <td><?php echo $value->number_plate ?></td>
                                                <td><?php echo $value->total ?></td>
                                               
                                                <td class="jsgrid-align-center ">

                                                
                                                   

                                                  <a href="<?php echo base_url(); ?>customer/view_pos?I=<?php echo base64_encode($value->customer_id) ?>&id=<?php echo $value->pos_code ?>" title="View"  class="btn btn-sm btn-info waves-effect waves-light " ><i class="fa fa-eye"></i></a>

                                                   
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-4">
                        <div class="card">
                     
                            <div class="card-body">
                          
                                <div id="chartContainer" style="height: 350px; width: 100%;"></div>
                                                    
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- Column -->
                <div class="row">
                
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Recent Invoices</h4>
                                <div class="table-responsive" >
                                     <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                           

                                             <tr>
                                              <th>SNo </th>
                                              <th>Vehicle Name </th>
                                              <th>Model </th>
                                              <th>Number Plate </th>
                                              <!--<th> Price (₹)</th>-->
                                              <!--<th> Qty</th>-->
                                              <th>Total (₹)</th>
                                              <th>Action </th>
                                          </tr>
                                        </thead>
                                      
                                        <tbody>
                                           <?php
                                           $i=1;
                                           foreach($pos as $value){
                                            $pos_code = $value->pos_code;
                                            $sql = "SELECT * FROM `tbl_vehicle`  WHERE id='$value->vehicle_name'";
                                            $query=$this->db->query($sql);
                                            $result = $query->result();       
                                            foreach($result as $value1){ 
                                                $name1=$value1->vehicle_name;
                                             }      
                                            ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo $name1 ?></td>
                                                 <td><?php echo $value->model ?></td>
                                                <td><?php echo $value->number_plate ?></td>
                                                <td><?php echo $value->total ?></td>
                                               
                                                <td class="jsgrid-align-center ">
                                                 <a href="<?php echo base_url(); ?>customer/view_invoice?I=<?php echo base64_encode($value->customer_id) ?>&id=<?php echo $value->pos_code ?>" title="Invoice"  class="btn btn-sm btn-warning waves-effect waves-light " "><i class="fa fa-file"></i></a>

                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>                                
                            </div>
                        </div>
                    </div>
                 
                </div>
                
            </div>
                    <!------------- Dealer Dashboard Code end --------------->
                <?php } else {?>
                
               <!------------- Admin Dashboard Code start --------------->
               
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-xl-3 col-md-4">
                        <a href="#">
                            <div class="card alert-primary">
                                <div class="card-body">
                                    
                                    <div class="d-flex justify-content-between">
                                        <div class="d-block">
                                            <h3 class="fw-bold">Show Rooms</h3>
                                            <h3 class="fw-bold fs-3 mt-2 text-themecolor">0
                                            <?php 
                                                // $this->db->where('status','ACTIVE');
                                                // $this->db->where('em_role','DEALER');
                                                $this->db->from("customer");
                                                // echo $this->db->count_all_results();
                                            ?>  </h3>
                                        </div>
                                        <img width="64" height="64" src="https://img.icons8.com/external-flaticons-flat-flat-icons/64/external-showroom-automotive-dealership-flaticons-flat-flat-icons.png"/>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Column -->
                       <!-- Column -->
                    <div class="col-lg-3 col-xl-2 col-md-4">
                        <a href="<?php echo base_url(); ?>employee/Employees">
                            <div class="card alert-secondary">
                                <div class="card-body">
                                    
                                    <div class="d-flex justify-content-between">
                                        <div class="d-block">
                                            <h3 class="fw-bold">Dealers</h3>
                                            <h3 class="fw-bold fs-3 mt-2 text-themecolor">
                                            <?php 
                                            $sql = "SELECT COUNT(*) as count FROM `employee` WHERE em_role='DEALER'";
                                          
                                            $query=$this->db->query($sql);
                                            $result = $query->result();       
                                            foreach($result as $value1){ 
                                                $totalcount=$value1->count;
                                             }  
                                              echo $totalcount;
                                            ?>  </h3>
                                        </div>
                                        <img width="64" height="64" src="https://img.icons8.com/color/64/supplier.png" alt="supplier"/>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-xl-2 col-md-4">
                        <a href="#">
                            <div class="card alert-info">
                                <div class="card-body">
                                    
                                    <div class="d-flex justify-content-between">
                                        <div class="d-block">
                                            <h3 class="fw-bold">POS</h3>
                                            <h3 class="fw-bold fs-3 mt-2 text-themecolor">
                                            <?php 
                                                // $this->db->where('status','ACTIVE');
                                                // $this->db->where('em_role','DEALER');
                                                $this->db->from("quotation");
                                                echo $this->db->count_all_results();
                                            ?>  </h3>
                                        </div>
                                        <img width="64" height="64" src="https://img.icons8.com/color/64/pos-terminal--v1.png" alt="pos-terminal--v1"/>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-xl-3 col-md-4">
                        <a href="#">
                            <div class="card alert-warning">
                                <div class="card-body">
                                    
                                    <div class="d-flex justify-content-between">
                                        <div class="d-block">
                                            <h3 class="fw-bold">Invoices</h3>
                                            <h3 class="fw-bold fs-3 mt-2 text-themecolor">
                                            <?php 
                                                // $this->db->where('status','ACTIVE');
                                                // $this->db->where('em_role','DEALER');
                                                $this->db->from("invoice");
                                                echo $this->db->count_all_results();
                                            ?>  </h3>
                                        </div>
                                          <img width="64" height="64" src="https://img.icons8.com/fluency/64/receipt-and-change.png" alt="receipt-and-change"/>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                     <div class="col-lg-3 col-xl-2 col-md-4">
                        <a href="#">
                            <div class="card alert-success">
                                <div class="card-body">
                                    
                                    <div class="d-flex justify-content-between">
                                        <div class="d-block">
                                            <h3 class="fw-bold">Tickets</h3>
                                            <h3 class="fw-bold fs-3 mt-2 text-themecolor">
                                            0 </h3>
                                        </div>
                                        <img width="64" height="64" src="https://img.icons8.com/color/64/two-tickets.png" alt="two-tickets"/>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="row">
                    
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Dealers Wise Sales List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" >
                                   <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                           

                                             <tr>
                                              <th>SNo </th>
                                               <th>Dealer Name </th>
                                              <th>Vehicle Name </th>
                                              <th>Model </th>
                                              <th>Number Plate </th>
                                              <!--<th> Price (₹)</th>-->
                                              <!--<th> Qty</th>-->
                                              <!--<th>Total (₹)</th>-->
                                              <th>Action </th>
                                          </tr>
                                        </thead>
                                      
                                        <tbody>
                                           <?php
                                           $i=1;
                                           foreach($pos as $value){
                                            $pos_code = $value->pos_code;
                                            $sql = "SELECT * FROM `tbl_vehicle`  WHERE id='$value->vehicle_name'";
                                            $query=$this->db->query($sql);
                                            $result = $query->result();       
                                            foreach($result as $value1){ 
                                                $name1=$value1->vehicle_name;
                                             }  
                                             
                                               $sql1 = "SELECT * FROM `employee`  WHERE id='$value->created_by'";
                                            $query1=$this->db->query($sql1);
                                            $result1 = $query1->result();       
                                            foreach($result1 as $val){ 
                                                $first_name=$val->first_name;
                                                $last_name=$val->last_name;
                                             }   
                                            ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                 <td><?php echo $first_name ?> <?php echo $last_name ?></td>
                                                <td><?php echo $name1 ?></td>
                                                 <td><?php echo $value->model ?></td>
                                                <td><?php echo $value->number_plate ?></td>
                                                <!--<td><?php echo $value->total ?></td>-->
                                               
                                                <td class="jsgrid-align-center ">

                                                
                                                   

                                                  <a href="<?php echo base_url(); ?>customer/view_pos?I=<?php echo base64_encode($value->customer_id) ?>&id=<?php echo $value->pos_code ?>" title="View"  class="btn btn-sm btn-info waves-effect waves-light " ><i class="fa fa-eye"></i></a>

                                                   
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-4">
                        <div class="card">
                     
                            <div class="card-body">
                          
                                <div id="chartContainer" style="height: 350px; width: 100%;"></div>
                                                    
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                 
                </div>

                <div class="row">
                    
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Dealer Wise Invoice</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" >
                                     <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                           

                                             <tr>
                                              <th>SNo </th>
                                               <th>Dealer Name </th>
                                              <th>Vehicle Name </th>
                                              <th>Model </th>
                                              <th>Number Plate </th>
                                              <!--<th> Price (₹)</th>-->
                                              <!--<th> Qty</th>-->
                                              <!--<th>Total (₹)</th>-->
                                              <th>Action </th>
                                          </tr>
                                        </thead>
                                      
                                        <tbody>
                                           <?php
                                           $i=1;
                                           foreach($pos as $value){
                                            $pos_code = $value->pos_code;
                                            $sql = "SELECT * FROM `tbl_vehicle`  WHERE id='$value->vehicle_name'";
                                            $query=$this->db->query($sql);
                                            $result = $query->result();       
                                            foreach($result as $value1){ 
                                                $name1=$value1->vehicle_name;
                                             }   
                                             
                                                $sql1 = "SELECT * FROM `employee`  WHERE id='$value->created_by'";
                                            $query1=$this->db->query($sql1);
                                            $result1 = $query1->result();       
                                            foreach($result1 as $val){ 
                                                $first_name=$val->first_name;
                                                $last_name=$val->last_name;
                                             }  
                                            ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                 <td><?php echo $first_name ?> <?php echo $last_name ?></td>
                                                <td><?php echo $name1 ?></td>
                                                 <td><?php echo $value->model ?></td>
                                                <td><?php echo $value->number_plate ?></td>
                                                <!--<td><?php echo $value->total ?></td>-->
                                               
                                                <td class="jsgrid-align-center ">
                                                 <a href="<?php echo base_url(); ?>customer/view_invoice?I=<?php echo base64_encode($value->customer_id) ?>&id=<?php echo $value->pos_code ?>" title="Invoice"  class="btn btn-sm btn-warning waves-effect waves-light "><i class="fa fa-file"></i></a>

                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-4">
                        <div class="card">
                     
                            <div class="card-body">
                          
                                <div id="chartContainer1" style="height: 350px; width: 100%;"></div>
                                                    
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    
                  
                </div>
                <div class="row">
                    
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Show Room Wise Invoice</h4>
                                <div class="table-responsive" >
                                    <table class="table table-bordered table-hover earning-box">
                                        <thead>
                                            <tr class="bg-themecolor text-white fw-bold">
                                                <th> Id</th>
                                                <th> Product  Name</th>
                                                <th>  Created Date</th>
                                               <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                            <tr class="scrollbar" style="vertical-align:top">
                                                <td>#213234</td>
                                                <td>Product1</td>
                                                <td >20-03-2024</td>
                                                <td>Active</td>
                                              
                                            </tr>
                                            <tr class="scrollbar" style="vertical-align:top">
                                                <td>#2423423</td>
                                                <td>Product2</td>
                                                <td >21-03-2024</td>
                                                <td>Active</td>
                                              
                                            </tr>
                                            <tr class="scrollbar" style="vertical-align:top">
                                                <td>#24234</td>
                                                <td>Product3</td>
                                                <td >23-03-2024</td>
                                                <td>Active</td>
                                              
                                            </tr>
                                            <tr class="scrollbar" style="vertical-align:top">
                                                <td>#243245234</td>
                                                <td>Product4</td>
                                                <td >24-03-2024</td>
                                                <td>Active</td>
                                              
                                            </tr>
                                        
                                        </tbody>
                                    </table>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-4">
                        <div class="card">
                     
                            <div class="card-body">
                          
                                <div id="chartContainer2" style="height: 350px; width: 100%;"></div>
                                                    
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- Column -->  
                    </div>
                
                    <!------------- Admin Dashboard Code End ---------------> 
                    
               <?php } ?>
            </div>
               <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>                            
<?php $this->load->view('backend/footer'); ?>