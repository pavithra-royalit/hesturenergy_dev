<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<?php
  
  $sql = "SELECT * FROM `customer`   WHERE id='$basic->customer_id'";
  $query=$this->db->query($sql);
   $result = $query->result();  
   $result1 = count($query->result());       
   foreach($result as $value1){ 
     $name=$value1->name;
     $email=$value1->email;
     $phone=$value1->phone;
     $address=$value1->address;
     $state=$value1->state;
     $city=$value1->city;
     $zip=$value1->zip;
     $model=$value1->model;
     $year=$value1->year;
  
   }  
   
   $Vsql = "SELECT * FROM `tbl_vehicle`   WHERE id='$basic->vehicle_name'";
   $Vquery=$this->db->query($Vsql);
    $Vresult = $Vquery->result();  
    $result1 = count($query->result());       
    foreach($Vresult as $value1){ 
      $vehicle_name=$value1->vehicle_name;
      $vehicle_price=$value1->vehicle_price;
      $number_plate=$value1->number_plate;
      
   
    }  
?>

                     <div class="page-wrapper">
                     <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-users" style="color:#1976d2"></i> <?php echo $name; ?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
       
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills p-3 profile-tab flex-column" role="tablist">
                            
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#document" role="tab" style="font-size: 14px;">POS</a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#password" role="tab" style="font-size: 14px;"> Invoice</a> </li>

                              
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-9">
                        <div class="tab-content">
                    

                            
                            <?php $settingsvalue = $this->settings_model->GetSettingsValue(); ?>
                                <div class="tab-pane active" id="document" role="tabpanel">
                                <div class="card-body">
                                           <!-- report start -->
                               <div class="salaryr">    
                                 <div class="row payslip_print" id="payslip_print">
                                    <div class="col-md-12">
                                    <div class="card card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6 col-sm-6">
                                                <img src="<?php echo base_url(); ?>assets/images/<?php echo $settingsvalue->sitelogo; ?>" style=" width:80px; margin-right: 10px;">
                                            </div>
                                            <div class="col-md-6 col-xs-6 col-sm-6 text-left payslip_address">
                                            <h4><?php echo date("M d , Y");?></h4>
                                            <p>Purchase Order Date</p>
                                            </div>
                                        </div>
                                        <div class="row " style="background:#13637c; margin:15px 0px 15px 0px">
                                            <div class="col-md-12 text-left">
                                                <h4 style="margin-top: 15px;color:#fff; text-align:center">PURCHASE ORDER  #<?php echo $basic->pos_code; ?></h4>
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
                                                        <td>:&nbsp; <?php echo $name; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Company Email</td>
                                                        <td>:&nbsp; <?php echo $settingsvalue->system_email; ?></td>
                                                        <td>Email</td>
                                                        <td>:&nbsp; <?php echo $email; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td> Phone Number</td>
                                                        <td>: &nbsp; <?php echo $settingsvalue->contact; ?></td>
                                                        <td>Phone Number</td>
                                                        <td>:&nbsp; <?php echo $phone; ?></td>
                                                    </tr>
                                                    <tr>
                                                
                                                        <td>Address</td>
                                                        <td>: &nbsp; <?php echo $settingsvalue->address; ?></td>
                                                        <td>Address</td>
                                                        <td>: &nbsp; <?php echo $address; ?></td>
                                                    </tr></tbody></table>
                                            </div>
                                        </div>
                                    <div><hr></div>
                                        <div class="row" style="margin-bottom: 5px;">
                                            <div class="row col-md-12">
                                            <div class="col-md-4 m-b-5">
                                        <h6> <small class="text-black ">Vehicle Name</small> : <?php echo $vehicle_name; ?></h6> 
                                        </div>
                                       
                                        <div class="col-md-4 m-b-5">
                                        <h6>  <small class="text-muted ">Number Plate</small> : <?php echo $number_plate; ?></h6> 
                                        </div>
                                        <div class="col-md-4 m-b-5">
                                        <h6> <small class="text-muted">Date </small> : <?php echo $basic->date; ?></h6> 
                                        </div>
                                        <div class="col-md-4 m-b-5">
                                        <h6> <small class="text-muted">Vehicle Price</small> : <?php echo $vehicle_price; ?></h6> 
                                        </div>
                                        <div class="col-md-4 m-b-5">
                                        <h6> <small class="text-muted">Service Type </small> : <?php echo $basic->service_type; ?></h6> 
                                        </div>
                                        <div class="col-md-4 m-b-5">
                                        <h6> <small class="text-muted">Details </small> : <?php echo $basic->details; ?></h6> 
                                        </div>
                                            </div>
                                        </div>
                                        <div><hr></div>
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
                                                            foreach($pos as $value): ?>
                                                        <tr>
                                                            <td><?php echo $i++ ?></td>
                                                            <td><?php echo $value->item ?></td>
                                                            <td><?php echo $value->qty ?></td>
                                                            <td ><?php echo $value->price ?></td>
                                                            <td> <?php echo $value->total ?> </td>
                                                        </tr>
                                                    
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                    <tfoot class="tfoot-light">
                                                    <?php foreach($total as $val){ 
                                                        $total=$val->total;
                                                    
                                                    } ?>
                                                        
                                                        <?php 
                                                        $sub=$basic->fixed_service_charge;
                                                        $vprice=$vehicle_price;
                                                        $total=$total;
                                                       $sum = $sub+$total+$vprice;
                                                        ?>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th class="text-right">Sub Total (₹) : </th>
                                                            <th class="text-right" style="text-align:left !important"> <?php echo $total ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th class="text-right">Vehicle Amount (₹) : </th>
                                                            <th class="text-right" style="text-align:left !important">  <?php echo $vprice ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th class="text-right">Fixed Service Total (₹) : </th>
                                                            <th class="text-right" style="text-align:left !important"> <?php echo $basic->fixed_service_charge ?></th>
                                                        </tr>
                                                       
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th class="text-right">Total Service Amount (₹) : </th>
                                                            <th class="text-right" style="text-align:left !important;color:#ff1212">  <?php echo $sum ?></th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                 </div>
                                </div>
                                <button type="button" class="btn btn-primary print_payslip_btn" id="print_payslip_btn" style=""><i class="fa fa-print"></i><i class="" aria-hidden="true" onclick="printDiv()"></i>  Print</button>
                               <!-- report end -->
                          
                                </div>
                                   
                            </div>                    
                    
                          
                           
                            <div class="tab-pane" id="password" role="tabpanel">
                                <div class="card-body">
			                              <!-- invoice code start -->
			                                       <div class="salaryr">    
                                 <div class="row payslip_print" id="payslip_print">
                                    <div class="col-md-12">
                                    <div class="card card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6 col-sm-6">
                                                <img src="<?php echo base_url(); ?>assets/images/<?php echo $settingsvalue->sitelogo; ?>" style=" width:80px; margin-right: 10px;">
                                            </div>
                                            <div class="col-md-6 col-xs-6 col-sm-6 text-left payslip_address">
                                            <h4><?php echo date("M d , Y");?></h4>
                                            <p>Invoice</p>
                                            </div>
                                        </div>
                                        <div class="row " style="background:#13637c; margin:15px 0px 15px 0px">
                                            <div class="col-md-12 text-left">
                                                <h4 style="margin-top: 15px;color:#fff; text-align:center">Invoice Id  #<?php echo $basic->pos_code; ?></h4>
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
                                                        <td>:&nbsp; <?php echo $name; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Company Email</td>
                                                        <td>:&nbsp; <?php echo $settingsvalue->system_email; ?></td>
                                                        <td>Email</td>
                                                        <td>:&nbsp; <?php echo $email; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td> Phone Number</td>
                                                        <td>: &nbsp; <?php echo $settingsvalue->contact; ?></td>
                                                        <td>Phone Number</td>
                                                        <td>:&nbsp; <?php echo $phone; ?></td>
                                                    </tr>
                                                    <tr>
                                                
                                                        <td>Address</td>
                                                        <td>: &nbsp; <?php echo $settingsvalue->address; ?></td>
                                                        <td>Address</td>
                                                        <td>: &nbsp; <?php echo $address; ?></td>
                                                    </tr></tbody></table>
                                            </div>
                                        </div>
                                    <div><hr></div>
                                        <div class="row" style="margin-bottom: 5px;">
                                            <div class="row col-md-12">
                                            <div class="col-md-4 m-b-5">
                                        <h6> <small class="text-muted ">Vehicle Name</small> : <?php echo $vehicle_name; ?></h6> 
                                        </div>
                                       
                                        <div class="col-md-4 m-b-5">
                                        <h6>  <small class="text-muted ">Number Plate</small> : <?php echo $number_plate; ?></h6> 
                                        </div>
                                        <div class="col-md-4 m-b-5">
                                        <h6> <small class="text-muted">Date </small> : <?php echo $basic->date; ?></h6> 
                                        </div>
                                        <div class="col-md-4 m-b-5">
                                        <h6> <small class="text-muted">Vehicle Price</small> : <?php echo $vehicle_price; ?></h6> 
                                        </div>
                                        <div class="col-md-4 m-b-5">
                                        <h6> <small class="text-muted">Service Type </small> : <?php echo $basic->service_type; ?></h6> 
                                        </div>
                                        <div class="col-md-4 m-b-5">
                                        <h6> <small class="text-muted">Details </small> : <?php echo $basic->details; ?></h6> 
                                        </div>
                                            </div>
                                        </div>
                                        <div><hr></div>
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
                                                            foreach($pos as $value): ?>
                                                        <tr>
                                                            <td><?php echo $i++ ?></td>
                                                            <td><?php echo $value->item ?></td>
                                                            <td><?php echo $value->qty ?></td>
                                                            <td ><?php echo $value->price ?></td>
                                                            <td> <?php echo $value->total ?> </td>
                                                        </tr>
                                                    
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                    <tfoot class="tfoot-light">

                                                       
                                                        <?php 
                                                        $sub=$basic->fixed_service_charge;
                                                        $vprice=$vehicle_price;
                                                        $total=$total;
                                                        $sum = $sub+$total+$vprice;
                                                        ?>
                                                         <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th class="text-right">Sub Total (₹) : </th>
                                                            <th class="text-right" style="text-align:left !important"> <?php echo $total ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th class="text-right">Vehicle Amount (₹) : </th>
                                                            <th class="text-right" style="text-align:left !important">  <?php echo $vprice ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th class="text-right">Fixed Service Total (₹) : </th>
                                                            <th class="text-right" style="text-align:left !important"> <?php echo $basic->fixed_service_charge ?></th>
                                                        </tr>
                                                       
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th class="text-right">Total Service Amount (₹) : </th>
                                                            <th class="text-right" style="text-align:left !important;color:#ff1212">  <?php echo $sum ?></th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                 </div>
                                </div>
                                <button type="button" class="btn btn-primary print_payslip_btn" id="print_payslip_btn" style=""><i class="fa fa-print"></i><i class="" aria-hidden="true" onclick="printDiv()"></i>  Print</button>
                               <!-- report end -->
			                              <!-- invoice code end -->
                                </div>
                            </div>

                                                        
                        </div>
                    </div>
                    </div>
                    <!-- Column -->
                </div>
          
   <script type="text/javascript">
        $(document).ready(function () {
            $(".deletexp").click(function (e) {
                e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = $(this).attr('data-id');
                   if(confirm('Are you sure?')){
                        $.ajax({
                            url: 'pocvalueDelet?id=' + iid,
                            method: 'GET',
                            data: 'data',
                        }).done(function (response) {
                            console.log(response);
                            $(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
                            window.setTimeout(function(){location.reload()},2000)
                            // Populate the form fields with the data returned from server
						});
                     }else{
                        return false;
                        }
                    });
                });
</script>   

<?php $this->load->view('backend/footer'); ?>
<script>
    $('#pp').DataTable({
        "aaSorting": [[1,'asc']],
        dom: 'Bfrtip',
        buttons: [
            'csv','print'
        ]
    });
</script>

<script src="<?php echo base_url(); ?>assets/js/jquery.PrintArea.js" type="text/JavaScript"></script>
    <script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>
    <script>
    $(document).ready(function() {
        $(".print_payslip_btn").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.payslip_print").printArea(options);
        });
    });
    </script>                          