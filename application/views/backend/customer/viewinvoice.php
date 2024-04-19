<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<?php
  
    foreach($pos as $value) { 
        $inov_num = $value->inov_num;
        $vehicle_id = $value->vehicle_id;
        $model = $value->model;
        $number_plate = $value->number_plate;
        $amount = $value->amount;
          $service_type = $value->service_type;
          $sql = "SELECT * FROM `tbl_vehicle`  WHERE id='$vehicle_id'";
          $query=$this->db->query($sql);
          $result = $query->result();       
          foreach($result as $value1){ 
              $name1=$value1->vehicle_name;
                                                  
          }      
    // print_r($pos_code);
} 
    ?>

                     <div class="page-wrapper">
                     <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-users" style="color:#1976d2"></i> <?php echo $basic->name; ?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
            <?php $vehiclevalue = $this->vehicle_model->GetAllVehInfo(); ?>
            <div class="container-fluid">
                <div class="row">
               
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="tab-content">
                         
                          
                                <div class="tab-pane active" id="pos" role="tabpanel">
                                <div class="row" id="addon">
                                
                                      <div class="col-md-12">
                                      <div class="card">
                                      <div class="card-body">
                                         <!--<h4 class="text-center p-b-3" style="color:#13637c">View Po's Items: </h4>-->
                                         <a href="<?php echo base_url(); ?>customer/invoiceview?I=<?php echo base64_encode($basic->id) ?>" title="Edit"  class="btn btn-sm btn-info waves-effect waves-light  float-right" ><i class="fa fa-pencil-square-o"></i>List of Invoice</a>                                                            
                                         <?php $settingsvalue = $this->settings_model->GetSettingsValue(); ?>
                                          <!-- report start -->
                               <div class="salaryr mt-5">    
                                 <div class="row payslip_print" id="invoice1">
                                    <div class="col-md-12">
                                    <div class="card card-body">
                                        <div class="card-header alert-info">
                                            <div class="row">
                                                <div class="col-md-6 col-xs-6 col-sm-6">
                                                    <img src="<?php echo base_url(); ?>assets/images/<?php echo $settingsvalue->sitelogo; ?>" style=" width:80px; margin-right: 10px;">
                                                </div>
                                                <div class="col-md-6 col-xs-6 col-sm-6 text-left payslip_address">
                                                <h4><?php echo date("M d , Y");?></h4>
                                                <p class="fw-500">Invoice Order Date</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row " style="background:#13637c; margin:15px 0px 15px 0px">
                                            <div class="col-md-12 text-left">
                                                <h4 style="margin-top: 15px;color:#fff; text-align:center">INVOICE ORDER  #<?php echo $inov_num; ?></h4>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom: 5px;">
                                            <div class="col-md-12">
                                                <table class="table table-condensed borderless payslip_info">
                                                    <tbody>
                                                    <tr>
                                                        <td>From : </td>
                                                        <td></td>
                                                        <td> TO : </td>
                                                        <td></td>
                                                    </tr>
                                                        <tr>
                                                        <td>Company Name</td>
                                                        <td>:&nbsp; <?php echo $settingsvalue->sitetitle; ?></td>
                                                        <td>Name</td>
                                                        <td>:&nbsp; <?php echo $basic->name; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Company Email</td>
                                                        <td>:&nbsp; <?php echo $settingsvalue->system_email; ?></td>
                                                        <td>Email</td>
                                                        <td>:&nbsp; <?php echo $basic->email; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td> Phone Number</td>
                                                        <td>: &nbsp; <?php echo $settingsvalue->contact; ?></td>
                                                        <td>Phone Number</td>
                                                        <td>:&nbsp;  <?php echo $basic->phone; ?></td>
                                                    </tr>
                                                    <tr>
                                                
                                                        <td>Address</td>
                                                        <td>: &nbsp; <?php echo $settingsvalue->address; ?></td>
                                                        <td>Address</td>
                                                        <td>: &nbsp; <?php echo $basic->address; ?></td>
                                                    </tr></tbody></table>
                                            </div>
                                        </div>
                                    <div><hr></div>
                                        <div class="row" style="margin-bottom: 5px;">
                                            <div class="row col-md-12">
                                            <div class="col-md-4 m-b-5">
                                        <h6> <small class="text-black ">Vehicle Name</small> : <?php echo $name1; ?></h6> 
                                        </div>
                                       
                                        <!--<div class="col-md-4 m-b-5">-->
                                        <!--<h6>  <small class="text-muted ">Number Plate</small> : <?php echo $number_plate; ?></h6> -->
                                        <!--</div>-->
                                        <div class="col-md-4 m-b-5">
                                        <h6> <small class="text-muted">Model </small> : <?php echo $model; ?></h6> 
                                        </div>
                                        <div class="col-md-4 m-b-5">
                                        <h6> <small class="text-muted">Vehicle Price</small> : <?php echo $amount; ?></h6> 
                                        </div>
                                        <div class="col-md-4 m-b-5">
                                        <h6> <small class="text-muted">Service Type </small> : <?php echo $service_type; ?></h6> 
                                        </div>
                                       
                                            </div>
                                        </div>
                                        <div><hr></div>
                                        <style>
                                            .table-condensed>thead>tr>th, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>tbody>tr>td, .table-condensed>tfoot>tr>td { padding: 2px 5px; }
                                        </style>
                                     
                                    </div>
                                    </div>
                                 </div>
                                </div>
                                <button class="btn btn-primary" id="download"> download pdf</button>
                              
                               <!-- report end -->


                                         
                             
                  


                                       </div>   
                                     </div>
                                </div>   
                                <div class="col-md-1"></div>
                              </div>
                                   
                            </div>                    
                    
                          
                    
                         
                           
                            
                        </div>
                    </div>

                    </div>
                    <!-- Column -->
                </div>
          
  

<script>
  window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice1");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'myfile.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}

    
    </script>                          
<?php $this->load->view('backend/footer'); ?>



                        