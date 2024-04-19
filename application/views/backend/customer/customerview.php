<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
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
                                <li class="nav-item"> <a class="nav-link active"  href="<?php echo base_url(); ?>customer/customerview?I=<?php echo base64_encode($basic->id); ?>"  style="font-size: 14px;"> Customer Info </a> </li>
                                <li class="nav-item"> <a class="nav-link"  href="<?php echo base_url(); ?>customer/posview?I=<?php echo base64_encode($basic->id); ?>"  style="font-size: 14px;"> Po's </a> </li>
                                 <li class="nav-item"> <a class="nav-link"  href="<?php echo base_url(); ?>customer/invoiceview?I=<?php echo base64_encode($basic->id); ?>" style="font-size: 14px;"> Invoice </a> </li>
                                <li class="nav-item"> <a class="nav-link"  href="<?php echo base_url(); ?>customer/jobcardview?I=<?php echo base64_encode($basic->id); ?>"  style="font-size: 14px;"> Job Card</a> </li>
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
                                                                                               
                                                        <h4 class="text-center p-b-10" style="color:#13637c">Customer Details: </h4>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-12 col-md-7 m-auto">
                                                                <div class="table-responsive">
                                                                    <table class="table border">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th><h6 class="text-muted " >Customer Name </h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $basic->name; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><h6 class="text-muted ">Phone</h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $basic->phone; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><h6 class="text-muted ">Email address</h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $basic->email; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><h6 class="text-muted ">State</h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $basic->state; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><h6 class="text-muted "> City  </h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $basic->city; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><h6 class="text-muted ">Zip Code </h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $basic->zip; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><h6 class="text-muted ">Company Name </h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $basic->company_name; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><h6 class="text-muted ">GST (%) </h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $basic->gst; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><h6 class="text-muted ">Created Date </h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $basic->created_date; ?></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th><h6 class="text-muted ">Address </h6></th>
                                                                                <td>:</td>
                                                                                <td><?php echo $basic->address; ?></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                           <!--<div class="col-md-12 m-b-5">           
                                                            <h6>  <small >Customer Name </small>: <?php echo $basic->name; ?></h6> 
                                                            </div>
                                                            <div class="col-md-12 m-b-5">
                                                                    
                                                            <h6><small >Phone</small> : <?php echo $basic->phone; ?></h6> 
                                                            </div>
                                                            <div class="col-md-12 m-b-5">
                                                            <h6> <small >Email address </small> : <?php echo $basic->email; ?></h6> 
                                                            </div>
                                                            <div class="col-md-12 m-b-5">
                                                            <h6> <small class="text-muted ">State</small> : <?php echo $basic->state; ?></h6> 
                                                            </div>
                                                            <div class="col-md-12 m-b-5">
                                                                <h6> <small >City </small> : <?php echo $basic->city; ?></h6> 
                                                            </div>
                                                            <div class="col-md-12 m-b-5">
                                                            <h6>  <small class="text-muted ">Zip Code</small> : <?php echo $basic->zip; ?></h6> 
                                                            </div>
                                                            <div class="col-md-12 m-b-5">
                                                                <h6> <small class="text-muted ">Company Name</small> : <?php echo $basic->company_name; ?></h6> 
                                                            </div>
                                                            <div class="col-md-12 m-b-5">
                                                            <h6> <small class="text-muted ">GST (%)</small> : <?php echo $basic->gst; ?></h6> 
                                                            </div>
                                                            <div class="col-md-12 m-b-5">
                                                            <h6> <small class="text-muted ">Created Date</small> : <?php echo $basic->created_date; ?></h6> 
                                                            </div>
                                                            <div class="col-md-12 m-b-5">
                                                            <h6> <small class="text-muted ">Address</small> : <?php echo $basic->address; ?></h6> 
                                                            </div>-->
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
          
     


<?php $this->load->view('backend/footer'); ?>



                        