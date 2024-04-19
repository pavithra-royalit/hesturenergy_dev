<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<?php
  
    foreach($job_card as $value) { 
        $id = $value->id;
        $job_code = $value->job_code;
        $indate = $value->indate;
        $outdate = $value->outdate;
        $kmsrun = $value->kmsrun;
        $chasis = $value->chasis;
        $enginno = $value->enginno;
        $model = $value->model;
         $vehicle = $value->vehicle;
          $number_plate = $value->number_plate;
        $service_type = $value->service_type;
         $status = $value->status;
        $created_by = $value->created_by;
         
          $sql = "SELECT * FROM `tbl_vehicle`  WHERE id='$vehicle'";
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
                           
                          
                         
                    
                          
                         <!--job card code start -->
                              <div class="tab-pane active" id="jobcard" role="tabpanel">
                                <div class="card-body">
			                              <!-- job card code start -->

                                          <div class="row" id="addon">
                                <div class="col-md-1"></div>
                                      <div class="col-md-12">
                                      <div class="card">
                                      <div class="col-md-10 mt-3">
                                      <a href="<?php echo base_url(); ?>customer/jobcardview?I=<?php echo base64_encode($basic->id) ?>" title="Edit"  class="btn btn-info waves-effect waves-light  float-right" "><i class="fa fa-pencil-square-o"></i>List of Job Card </a>
                                    
                                      </div>   
                                      <div class="card-body">
                                             
                    <h4 class="text-center p-b-3" style="color:#13637c">Edit Job Card </h4>

                                      

                                         <form method="post" action="Add_jobcard" id="roleform" >
                                            <div class="modal-body row">
                                            <div class="form-group col-md-3">
                                                    <label class="control-label">Job Card No</label>
                                                    <input type="text" name="job_code" class="form-control" id="recipient-name1" value="<?php echo $job_code ?>" readonly>
                                                </div>
                                               
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">In Date/Time</label>
                                                    <input type="datetime-local" name="indate" class="form-control" id="recipient-name1" value="<?php echo $indate ?>" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">Out Date/Time</label>
                                                    <input type="datetime-local" name="outdate" class="form-control" id="recipient-name1" value="<?php echo $outdate ?>" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">KMS Run</label>
                                                    <input type="text" name="kmsrun" class="form-control price1" id="recipient-name1" value="<?php echo $kmsrun ?>"  required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">Service Type</label>
                                                    <select class="form-control" name="service_type">
                                                    <option value="Paid" <?php if($service_type == 'Paid') { ?> selected="selected"<?php } ?>>Paid</option>
                                                    <option value="Free" <?php if($service_type == 'Free') { ?> selected="selected"<?php } ?>>Free</option>
                                                    </select>
                                                </div>
                                                 <div class="form-group col-md-12">
                                                <h5>Customer Details</h5>
                                                        </div>
                                                         <div class="form-group col-md-4">
                                                    <label class="control-label">Customer Name</label>
                                                    <input type="text" class="form-control " id="recipient-name1" value="<?php echo $basic->name; ?>" readonly>
                                                </div>
                                                 <div class="form-group col-md-4">
                                                    <label class="control-label">Customer Email</label>
                                                    <input type="text"  class="form-control" id="recipient-name1" value="<?php echo $basic->email; ?>" readonly>
                                                </div>
                                                 <div class="form-group col-md-4">
                                                    <label class="control-label">Customer Mobile</label>
                                                    <input type="text"  class="form-control" id="recipient-name1" value="<?php echo $basic->phone; ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-12">
                                                <h5>Vehicle Details</h5>
                                                        </div>
                                                        
                                                            
                                                          <div class="form-group col-md-4">
                                                    <label class="control-label">Name of Vehicle</label>
                                                      <input type="text" name="vehicle" class="form-control " id="recipient-name1" value="<?php echo $vehicle ?>" required>
                                                </div>


                                                 <div class="form-group col-md-4">
                                                    <label class="control-label">Number Plate</label>
                                                    <input type="text" name="number_plate" class="form-control " id="recipient-name1" value="<?php echo $number_plate ?>" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Model Name</label>
                                                    <input type="text" name="model" class="form-control" id="recipient-name1" value="<?php echo $model ?>" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Chasis No</label>
                                                    <input type="text" name="chasis" class="form-control" id="recipient-name1" value="<?php echo $chasis ?>" required>
                                                </div>
                                                
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Engine No</label>
                                                    <input type="text" name="enginno" class="form-control" id="recipient-name1" value="<?php echo $enginno ?>" required>
                                                    <input type="hidden" class="form-control"  name="cid" value="<?php echo $basic->id; ?>">
                                                </div>
                                                  <div class="form-group col-md-">
                                                    <label class="control-label">Service Type</label>
                                                    <select class="form-control" name="status">
                                                    <option value="Open" <?php if($status == 'Open') { ?> selected="selected"<?php } ?>>Open</option>
                                                    <option value="Completed" <?php if($status == 'Completed') { ?> selected="selected"<?php } ?>>Completed</option>
                                                    </select>
                                                </div>
                                                                                         
                                        </div>
                                        <div class="modal-footer">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control" id="recipient-name1"> 
                                        <input type="hidden" name="created_by" value="<?php echo $created_by ?>" class="form-control" id="recipient-name1">    
                                           
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                 </form>

                             
                      <div class="row edit_addon">
                                      
                            
                                      <div class="col-md-12">
                                      <div class="card-body">
                                         <h4 class="text-center p-b-3" style="color:#13637c">Add Other Service Charges: </h4>
                                          <hr>
                                          <form class="row" action="Add_job_item" method="post" enctype="multipart/form-data">
                                              <div class="form-group col-md-4 m-t-5">
                                                  <label class="">Item<span style="color:red">*</span></label>
                                                  <input type="text" name="pitem" class="form-control"  required>
                                              </div>
                                             
                                              <div class="form-group col-md-4 m-t-5">
                                                  <label class="">Price (₹) <span style="color:red">*</span></label>
                                                  <input type="text" name="pprice" class="form-control vprice" id="price" required>
                                              </div>
                                                                                              
                                              <div class="form-group col-md-3">
                                                  <div class="col-sm-12" style="margin-top:2.5rem">
                                                      <input type="hidden" name="cid" value="<?php echo $basic->id; ?>">
                                                      <input type="hidden" name="job_code" value="<?php echo $job_code; ?>">     
                                                                                           
                                                      <button type="submit" class="btn btn-success">Save</button>
                                                  </div>
                                              </div>
                                      
                                          </form>
                                  
                                          <div class="table-responsive ">
                                              <table  id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                  <thead>
                                                      <tr>
                                                          <th>SNo </th>
                                                          <th>Item</th>
                                                          <th> Price (₹)</th>
                                                          <th>Action </th>
                                                      </tr>
                                                  </thead>
                                                  
                                                  <tbody>
                                                  <?php 
                                                  $i ='1';
                                                  foreach($job_item as $value): ?>
                                                      <tr>
                                                          <td><?php echo $i++ ?></td>
                                                          <td><?php echo $value->pitem ?></td>
                                                          <td><?php echo $value->pprice ?></td>
                                                          <td> <a href="#" title="Delete" class="btn btn-sm btn-info waves-effect waves-light deletexp" data-id="<?php echo $value->id ?>"><i class="fa fa-trash-o"></i></a></td>
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
                                <div class="col-md-1"></div>
                              </div>

                                          <!-- job card code end -->
                                </div>
                            </div>
                           
                              <!--job card code emd -->
                           
                           
                      
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
                            url: 'jobvalueDelet?id=' + iid,
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



                        