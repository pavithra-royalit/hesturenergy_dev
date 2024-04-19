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
                                <li class="nav-item"> <a class="nav-link "  href="<?php echo base_url(); ?>customer/customerview?I=<?php echo base64_encode($basic->id); ?>"  style="font-size: 14px;"> Customer Info </a> </li>
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
                       
                            <div class="col-md-1"></div>
                            <!--second tab-->
                                                  
                            <div class="tab-pane active" id="jobcard" role="tabpanel">
                                <div class="card-body">
			                             <!-- job card code start -->
                                         <div class="row" id="addon">
                                <div class="col-md-1"></div>
                                      <div class="col-md-10">
                                      <div class="card">
                                      <div class="card-body">
                                         <h4 class="text-center p-b-3" style="color:#13637c"> Jobcard List : </h4>

                                         <a href="<?php echo base_url(); ?>customer/addJobcard?I=<?php echo base64_encode($basic->id) ?>" title="Edit"  class="btn btn-info waves-effect waves-light  float-right mb-3 "><i class="fa fa-pencil-square-o"></i>Add Jobcard</a>

                                                                                                     
                                         <div class="table-responsive">
                                    <table id="example123" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                  <thead>
                                                      <tr>
                                                          <th>SNo </th>
                                                          <th>JobCard No </th>
                                                          <th>Service Type</th>
                                                          <th>Customer Name</th>
                                                          <th> Service Date </th>
                                                         <th>Status</th>
                                                          <th>Action </th>
                                                      </tr>
                                                  </thead>
                                                  
                                                  <tbody>
                                                  <?php
                                                   $i=1;
                                                   foreach($jobcard as $value) { 
                                                        $date = $value->outdate;
                                                        $status = $value->status;
                                                
                                                   ?>
                                                    <tr>
                                                   <td><?php echo $i++ ?></td>
                                                   <td><?php echo $value->job_code ?></td>
                                                   <td><?php echo $value->service_type ?></td>
                                                   <td><?php echo $basic->name ?></td>
                                                   <td><?php echo date('d-m-Y',strtotime($date)) ?></td>
                                                    <td><?php echo $value->status ?></td>
                                              
                                                <td class="jsgrid-align-center ">

                                                
                                                   
                                                <a href="<?php echo base_url(); ?>customer/edit_jobcard?I=<?php echo base64_encode($basic->id) ?>&id=<?php echo $value->job_code ?>" title="Edit"  class="btn btn-sm btn-primary waves-effect waves-light " "><i class="fa fa-pencil-square-o"></i></a>
                                               
                                               <a href="<?php echo base_url(); ?>customer/jobcard_View?I=<?php echo base64_encode($basic->id) ?>&id=<?php echo $value->job_code ?>" title="Invoice"  class="btn btn-sm btn-dark waves-effect waves-light " "><i class="fa fa-eye"></i></a>
                                              
                                                <?php if($status == "Completed"){ ?>
                                                 <a href="<?php echo base_url(); ?>customer/jobcard_invoice?I=<?php echo base64_encode($basic->id) ?>&id=<?php echo $value->job_code ?>" title="Invoice"  class="btn btn-sm btn-warning waves-effect waves-light " "><i class="fa fa-file-pdf-o"></i></a>
                                                  <a href="<?php echo base_url(); ?>customer/gatepass?I=<?php echo base64_encode($basic->id) ?>&id=<?php echo $value->job_code ?>" title="Gate Pass"  class="btn btn-sm btn-info waves-effect waves-light " "><i class="fa fa-file"></i></a>
                                              <?php } ?>
                                                   <a onclick="confirm('Are you sure, you want to delete this?')" href="#" title="Delete"  class="btn btn-sm btn-danger waves-effect waves-light jobdelet" data-id="<?php echo $value->id; ?>"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                                    
                                                  </tbody>
                                              </table>
                                          </div>
                                
                                       </div>   
                                     </div>
                                </div>   
                                <div class="col-md-1"></div>
                              </div>
                                         <!-- end -->
                                </div>
                            </div>
                          
                    </div>
                    </div>
                    <!-- Column -->
                </div>
   
<script type="text/javascript">
    $(document).ready(function () {
        $(".jobdelet").click(function (e) {
            e.preventDefault(e);
            // Get the record's ID via attribute  
            var iid = $(this).attr('data-id');
            $.ajax({
                url: 'jvalueDelet?id=' + iid,
                method: 'GET',
                data: 'data',
            }).done(function (response) {
                console.log(response);
                $(".message").fadeIn('fast').delay(3000).fadeOut('fast').html(response);
                window.setTimeout(function(){location.reload()},2000)
                // Populate the form fields with the data returned from server
			});
        });
    });
</script> 


<?php $this->load->view('backend/footer'); ?>



                        