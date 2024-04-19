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
                        <li class="breadcrumb-item active">Staff List</li> 
                    </ol>
                </div>
            </div>
                   <?php $shiftvalue = $this->shift_model->emselect(); ?>
            <div class="container-fluid mt-3 mb-3">
                <div class="row">
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            
                            <!-- Tab panes -->

                            <div class="tab-content">
                  
                                    <div class="card">
				                 
                               
                                                <div class="col-md-12">
				                                <form class="row" action="Update" method="post" enctype="multipart/form-data">
                                               
                                    <div class="form-group col-md-4 m-t-5">
                                    <label> Full Name</label>
                                        <input type="text" name="fullname" class="form-control form-control-line" minlength="2" value="<?php echo $basic->fullname; ?>" required > 
                                    </div>
                                    <div class="form-group col-md-4 m-t-5">
                                        <label>Email </label>
                                        <input type="email" id="example-email2" name="email" class="form-control"    value="<?php echo $basic->email; ?>" required > 
                                    </div>
                                      <div class="form-group col-md-4 m-t-5">
                                        <label>Office Shift</label>
                                        <select name="shift_name" value="" class="form-control custom-select" required>
                                            
                                        <option value="<?php echo $basic->shift_name; ?>"><?php echo $basic->shift_name; ?></option>
                                            <?Php foreach($shiftvalue as $value): ?>
                                             <option value="<?php echo $value->shift_name ?>"><?php echo $value->shift_name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 m-t-5">
                                        <label>Contact Number </label>
                                        <input type="text" name="phone" class="form-control" value="<?php echo $basic->phone; ?>" minlength="10" maxlength="15" required> 
                                    </div>  
                                  
                                    <div class="form-group col-md-6 m-t-5">
                                        <label>Location </label>
                                        <input type="text" id="example-email2" name="location" class="form-control"  value="<?php echo $basic->location; ?>" required > 
                                    </div>
                                    <div class="form-group col-md-6 m-t-5">
                                        <label>User Name </label>
                                        <input type="text" id="example-email2" name="username" class="form-control"  value="<?php echo $basic->username; ?>" readonly > 
                                    </div>
                                    <div class="form-group col-md-6 m-t-5">
                                                        <label>Status </label>
                                                        <select name="status" class="form-control custom-select" required >
				                                            <option value="<?php echo $basic->status; ?>"><?php echo $basic->status; ?></option>
                                                            <option value="ACTIVE">ACTIVE</option>
                                                            <option value="INACTIVE">INACTIVE</option>
                                                        </select>
                                                    </div>
                                    <div class="form-group col-md-6 m-t-5">
                                        <label>Address</label>
                                        <textarea class="form-control" name="address"><?php echo $basic->address; ?></textarea>
                                     
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