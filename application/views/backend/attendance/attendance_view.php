<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
                     <div class="page-wrapper">
                     <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-users" style="color:#1976d2"></i>Staff Management</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"> Staff Management </a></li>
                        <li class="breadcrumb-item active">Attendance List</li> 
                    </ol>
                </div>
            </div>
                   <?php $attenvalue = $this->attendance_model->emselect(); 
                    $leavevalue = $this->attendance_model->leaveselect();
                    $empvalue = $this->staff_model->emselect();
                    ?>
            <div class="container-fluid mt-3 mb-3">
                <div class="row">
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            
                            <!-- Tab panes -->

                            <div class="tab-content">
                  
                                    <div class="card">
				                 
                               
                                                <div class="col-md-12">
				                                <form class="row" action="Update" method="post" enctype="multipart/form-data">
                                               
                                    <div class="form-group col-md-4 m-t-10">
                                        <label>Attendance Type </label>
                                        <select name="attendance_type" class="form-control custom-select" required>
                                         <option value="<?php echo $basic->attendance_type; ?>"><?php echo $basic->attendance_type; ?></option>
                                            <option value="Daily">Daily</option>
                                                          
                                        </select>
                                    </div>
                                       <div class="form-group col-md-4 m-t-10">
                                        <label>Attendance Date </label>
                                        <input type="date" id="example-email2" name="attendance_date" class="form-control"  value="<?php echo $basic->attendance_date; ?>" required > 
                                    </div>
                                    
                                      <div class="form-group col-md-4 m-t-10">
                                        <label>Attendance Status </label>
                                        <select name="attendance_status" class="form-control custom-select" required>
                                 
                                            <?Php foreach($leavevalue as $value){ 
                                                if($basic->attendance_status !=  $value->id){
                                                ?>
                                             <option value="<?php echo $value->id ?>"><?php echo $value->title ?></option>
                                             <?php } else { ?>
                                                <option value="<?php echo $value->id ?>" selected><?php echo $value->title ?></option>
                                            <?php } }?>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 m-t-10">
                                        <label>Employees</label>

                                        
                                         <select class="select2 form-control  select2-multiple" data-placeholder="Choose a Employees" tabindex="1" name="employees[]" multiple="multiple" >
                                            <?Php foreach($empvalue as $value){ 
                                                     if($basic->user_id !=  $value->id){
                                                ?>
                                                     <option value="<?php echo $value->id ?>"><?php echo $value->fullname ?></option>
                                             <?php } else { ?>
                                             <option value="<?php echo $value->id ?>"><?php echo $value->fullname ?></option>
                                            <?php } }?>
                                                </select>
                                    </div>
                                  
                                   
                            
                                
         
				                     
				                                    <div class="form-actions col-md-12 mb-3">
                                                        <input type="hidden" name="emid" value="<?php echo $basic->id; ?>">
				                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
				                                        <button type="button" class="btn btn-danger">Cancel</button>
				                                    </div>
				                                    
				                                </form>
                                                </div>
                                              
                                    
				                        </div>
                                    </div>
                                </div>
                                                                                           
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
          


<?php $this->load->view('backend/footer'); ?>