<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<?php
  
    foreach($jobcard as $value) { 
        $job_code = $value->job_code;
        $indate = $value->indate;
        $outdate = $value->outdate;
        $kmsrun = $value->kmsrun;
        $model = $value->model;
       $chasis = $value->chasis;
       $enginno = $value->enginno;
       $service_type = $value->service_type;
       $status = $value->status;
        $vehicle = $value->vehicle;
         $number_plate = $value->number_plate;
    // print_r($pos_code);
     $sql = "SELECT * FROM `tbl_vehicle`  WHERE id='$vehicle'";
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
                <div class="col-1 col-md-1 col-lg-1"></div>
                    <div class="col-10 col-md-10 col-lg-10">
                        <div class="card">
                            <!-- Nav tabs -->

                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link"  href="<?php echo base_url(); ?>customer/customerview?I=<?php echo base64_encode($basic->id); ?>"  style="font-size: 14px;"> Customer Info </a> </li>
                                <li class="nav-item"> <a class="nav-link"  href="<?php echo base_url(); ?>customer/posview?I=<?php echo base64_encode($basic->id); ?>"  style="font-size: 14px;"> Po's </a> </li>
                                 <li class="nav-item"> <a class="nav-link"  href="<?php echo base_url(); ?>customer/invoiceview?I=<?php echo base64_encode($basic->id); ?>" style="font-size: 14px;"> Invoice </a> </li>
                                <li class="nav-item"> <a class="nav-link active"  href="<?php echo base_url(); ?>customer/jobcardview?I=<?php echo base64_encode($basic->id); ?>"  style="font-size: 14px;"> Job Card</a> </li>
                                <li class="nav-item"> <a class="nav-link"  href="<?php echo base_url(); ?>customer/notesview?I=<?php echo base64_encode($basic->id); ?>"  style="font-size: 14px;"> Notes</a> </li>
                              
                            </ul>

                            </div>
                    </div>
                    <div class="col-1 col-md-1 col-lg-1"></div>
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-10 m-auto">
                                            <div class="card">
                		                        <div class="card-body">
                                                                                               
                                                        <h4 class="text-center p-b-10" style="color:#13637c">Job Card Details: </h4>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-12 col-md-7 m-auto">
                                                                <div class="table-responsive">
                                                                    <table class="table border">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th><h6 class="text-muted " >Job Card No </h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $job_code; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><h6 class="text-muted ">In Date/Time</h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $indate; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><h6 class="text-muted ">Out Date/Time</h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $outdate; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><h6 class="text-muted ">KMS Run</h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $kmsrun; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><h6 class="text-muted "> Service Type  </h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $service_type; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><h6 class="text-muted ">Customer Name </h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $basic->name; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><h6 class="text-muted ">Customer Email </h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $basic->email; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><h6 class="text-muted ">Customer Mobile </h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $basic->phone; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><h6 class="text-muted ">Name of Vehicle </h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $name1; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><h6 class="text-muted ">Number Plate </h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $number_plate; ?></td>
                                                                            </tr>
                                                                             <tr>
                                                                                <th><h6 class="text-muted ">Model Name</h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $model; ?></td>
                                                                            </tr>
                                                                             <tr>
                                                                                <th><h6 class="text-muted ">Chasis No</h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $chasis; ?></td>
                                                                            </tr>
                                                                             <tr>
                                                                                <th><h6 class="text-muted ">Engine No</h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $enginno; ?></td>
                                                                            </tr>
                                                                             <tr>
                                                                                <th><h6 class="text-muted ">Status</h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $status; ?></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                
                                                                 <div class="table-responsive ">
                                              <table  id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                  <thead>
                                                      <tr>
                                                          <th>SNo </th>
                                                          <th>Item</th>
                                                          <th> Price (₹)</th>
                                                          
                                                      </tr>
                                                  </thead>
                                                  
                                                  <tbody>
                                                  <?php 
                                                  $i ='1';
                                                  foreach($jobcard_item as $value): ?>
                                                      <tr>
                                                          <td><?php echo $i++ ?></td>
                                                          <td><?php echo $value->pitem ?></td>
                                                          <td><?php echo $value->pprice ?></td>
                                                         
                                                      </tr>
                                                      <?php endforeach; ?>
                                                  </tbody>
                                              </table>
                                          </div>
                                                            </div>
                                                       
                                                         </div>
                
                                                 
                                                </div>
                                            </div>    
                                                                                          
                                        </div>
                                    </div>
                                </div>
                                <!--second tab-->
                        
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



                        