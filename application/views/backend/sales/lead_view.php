<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
                     <div class="page-wrapper">
                     <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-users" style="color:#1976d2"></i> Update Leads</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Leads</li>
                    </ol>
                </div>
            </div>
       
            <div class="container-fluid mt-3 mb-3">
                <div class="row">
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            
                            <!-- Tab panes -->

                            <div class="tab-content">
                  
                                    <div class="card">
				                 
                               
                                                <div class="col-md-12">
				                                <form class="row" action="Update" method="post" enctype="multipart/form-data">
                                                <div class="form-group col-md-6 m-t-10">
                                        <label>Lead Source </label>
                                        <select name="lead_from" class="form-control custom-select" required>
                                        <option value="<?php echo $basic->lead_from; ?>"><?php echo $basic->lead_from; ?></option>
                                            <option value="Google">Google</option>
                                 
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 m-t-10">
                                        <label> Name</label>
                                        <input type="text" name="fname" class="form-control form-control-line" minlength="2" value="<?php echo $basic->fname; ?>" required > 
                                    </div>
                                    <div class="form-group col-md-6 m-t-10">
                                        <label>Contact Number </label>
                                        <input type="text" name="mobile" class="form-control" value="<?php echo $basic->mobile; ?>" minlength="10" maxlength="15" required> 
                                    </div>  
                                    <div class="form-group col-md-6 m-t-10">
                                        <label>Email </label>
                                        <input type="email" id="example-email2" name="email" class="form-control"    value="<?php echo $basic->email; ?>" required > 
                                    </div>
                                    <div class="form-group col-md-6 m-t-10">
                                        <label>Followup Date </label>
                                        <input type="date" id="example-email2" name="follow_up_date" class="form-control"  value="<?php echo $basic->follow_up_date; ?>"  required > 
                                    </div>
                                    <div class="form-group col-md-6 m-t-10">
                                        <label>Status </label>
                                        <select name="status" class="form-control custom-select" required>
                                            <?php
                                            $status=$basic->status_id;
                                            if($status == '1'){
                                                $status_name = "In Progress";
                                            } else if($status == '2'){
                                                $status_name = "Completed";
                                            }else if($status == '3'){
                                                $status_name = "Cancelled";
                                            }
                                            ?>
                                        <option value="<?php echo $basic->status_id; ?>"><?php echo $status_name; ?></option>
                                            <option value="1">In Progress</option>
                                            <option value="2">Completed</option>
                                            <option value="3">Cancelled</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 m-t-10">
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