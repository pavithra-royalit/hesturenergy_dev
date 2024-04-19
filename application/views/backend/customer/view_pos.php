<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<?php

            $id = $this->session->userdata('user_login_id');
            $basicinfo = $this->employee_model->GetBasic($id); 
    foreach($pos as $value) { 
        $vehicle_name = $value->vehicle_name;
        $pos_code = $value->pos_code;
        $vehicle_price = $value->vehicle_price;
        $model = $value->model;
        $qty = $value->qty;
          $vtotal = $value->total;
        $number_plate = $value->number_plate;
        $need_item = $value->need_item;
        $tax = $value->tax;
    // print_r($pos_code);
     $sql = "SELECT * FROM `tbl_vehicle`  WHERE id='$vehicle_name'";
      $query=$this->db->query($sql);
          $result = $query->result();       
            foreach($result as $value1){ 
              $name1=$value1->vehicle_name;
             }   
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
                               
                                          
                                      
                                      <div class="card-body">
                                          
                                                        <div class="row" id="addon">

                                      <div class="col-md-12">
                                      <div class="card">
                              
                                                <div class="card-body">
                                        <?php $settingsvalue = $this->settings_model->GetSettingsValue(); ?>        
                                          <!-- report start -->
                               <div class="salaryr">    
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
                                                <p class="fw-500">Purchase Order Date</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row " style="background:#13637c; margin:15px 0px 15px 0px">
                                            <div class="col-md-12 text-left">
                                                <h4 style="margin-top: 15px;color:#fff; text-align:center">PURCHASE ORDER  #<?php echo $pos_code; ?></h4>
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
                                     
                                        <div class="col-md-3 m-b-5">
                                        <h6> <b>Dealer Name </b> : <?php echo $basicinfo->first_name.' '.$basicinfo->last_name; ?></h6> 
                                        </div>
                                        <div class="col-md-3 m-b-5">
                                        <h6> <b> Dealer Email </b> : <?php echo $basicinfo->em_email ?></h6> 
                                        </div>
                                        <div class="col-md-3 m-b-5">
                                        <h6> <b> Dealer Mobile No </b> : <?php echo $basicinfo->em_phone ?></h6> 
                                        </div>
                                        <div class="col-md-3 m-b-5">
                                        <h6> <b> Dealer Address </b> : <?php echo $basicinfo->address ?></h6> 
                                        </div>
                                       
                                            </div>
                                        </div>
                                          
                                    <div><hr></div>
                                        <div class="row" >
                                           
                                            <div class="col-md-12">
                                                <table class="table table-condensed borderless" style="border-left: 1px solid #ececec;">
                                                    <thead class="thead-light" style="border: 1px solid #ececec;">
                                                        <tr>
                                                            <th>Vehicle Name </th>
                                                            <th>Model</th>
                                                            <th>Price</th>
                                                            <th> Qty </th>
                                                            <th>Need Items </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="border: 1px solid #ececec;">
                                                         <tr>
                                                            <td><?php echo $name1; ?></td>
                                                            <td><?php echo $model; ?></td>
                                                            <td><?php echo $vehicle_price; ?></td>
                                                            <td><?php echo $qty; ?></td>
                                                            <td>  <?php echo $need_item; ?> </td>
                                                        </tr>
                                                    
                                                  </tbody>
                                                  
                                                </table>
                                                
                                            </div>
                                        </div>
                                     
                                        <style>
                                            .table-condensed>thead>tr>th, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>tbody>tr>td, .table-condensed>tfoot>tr>td { padding: 2px 5px; }
                                        </style>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-condensed borderless" style="border-left: 1px solid #ececec;">
                                                    <thead class="thead-light" style="border: 1px solid #ececec;">
                                                        <tr>
                                                            <th>Item No</th>
                                                            <th>Description</th>
                                                            <th>QTY</th>
                                                            <th> Price (₹)</th>
                                                            <th>Total (₹)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="border: 1px solid #ececec;">
                                                    <?php 
                                                            $i ='1';
                                                            foreach($pos_item as $value): ?>
                                                        <tr>
                                                            <td><?php echo $i++ ?></td>
                                                            <td><?php echo $value->vitem ?></td>
                                                            <td><?php echo $value->vqty ?></td>
                                                            <td ><?php echo $value->vprice ?></td>
                                                            <td> <?php echo $value->vtotal ?> </td>
                                                        </tr>
                                                    
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                    <tfoot class="tfoot-light">
                                                  
                                                         <?php 
                                                           $sql = "SELECT SUM(vtotal) as total FROM `pos_item` WHERE `pos_code`='$pos_code'";
                                                           $query = $this->db->query($sql);
                                                           $result = $query->result();
                                                        foreach($result as $val){ 
                                                            $total=$val->total;
                                                        
                                                        } 
                                                       
                                                        $total=$total;
                                                       $sum = $total+$vtotal;
                                                        ?>
                                                       
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th class="text-right">Sub Total (₹) : </th>
                                                            <th class="text-right" style="text-align:left !important"><?php echo $total ?>  </th>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th class="text-right">Vehicle Amount (₹) : </th>
                                                            <th class="text-right" style="text-align:left !important"><?php echo $vtotal ?> </th>
                                                        </tr>
                                                         <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th class="text-right">Tax (%) : </th>
                                                            <th class="text-right" style="text-align:left !important;"> <?php echo $tax ?>  </th>
                                                        </tr>   
                                                       
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th class="text-right">Total Service Amount (₹) : </th>
                                                            <th class="text-right" style="text-align:left !important;color:#ff1212"> <?php echo $sum ?>  </th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                 </div>
                                </div>
                                
                                <button class="btn btn-primary" id="download" style="width: 150px;"> download pdf</button>
                                <a href="<?php echo base_url(); ?>customer/posview?I=<?php echo base64_encode($basic->id) ?>" title="Edit"  class="btn btn-info waves-effect waves-light  float-right" "><i class="fa fa-pencil-square-o"></i>List of Po's </a>                                               
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



                        