<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-university" aria-hidden="true"></i> Leads</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Sales Department </a></li>
                        <li class="breadcrumb-item active">Leads</li>
                    </ol>
                </div>
            </div>
            <div class="message"></div>

            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>lead/Leads" class="text-white"><i class="" aria-hidden="true"></i>  Leads List</a></button>
                     
                    </div>
                </div>
               <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"><i class="fa fa-user-o" aria-hidden="true"></i> Add New Lead<span class="pull-right " ></span></h4>
                            </div>
                            <?php echo validation_errors(); ?>
                               <?php echo $this->upload->display_errors(); ?>
                               
                               <?php echo $this->session->flashdata('formdata'); ?>
                               <?php echo $this->session->flashdata('feedback'); ?>
                            <div class="card-body">

                                <form class="row" method="post" action="Save" enctype="multipart/form-data">
                                <div class="form-group col-md-6 m-t-10">
                                        <label>Lead Source </label>
                                        <select name="lead_from" class="form-control custom-select" required>
                                            <option value="">Select Lead From</option>
                                            <option value="Google">Google</option>
                                 
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 m-t-10">
                                        <label> Name</label>
                                        <input type="text" name="fname" class="form-control form-control-line" minlength="2" required > 
                                    </div>
                                  
                                    <div class="form-group col-md-6 m-t-10">
                                        <label>Contact Number </label>
                                        <input type="text" name="mobile" class="form-control" value=""  minlength="10" maxlength="15" required> 
                                    </div>
                                 
                                 
                                    <div class="form-group col-md-6 m-t-10">
                                        <label>Email </label>
                                        <input type="email" id="example-email2" name="email" class="form-control"   required > 
                                    </div>

                                     
                                    <div class="form-group col-md-6 m-t-10">
                                        <label>Followup Date </label>
                                        <input type="date" id="example-email2" name="follow_up_date" class="form-control"  required > 
                                    </div>
                                         
                                    <div class="form-group col-md-6 m-t-10">
                                        <label>Status </label>
                                        <select name="status" class="form-control custom-select" required>
                                            <option>Select Status</option>
                                            <option value="1">In Progress</option>
                                            <option value="2">Completed</option>
                                            <option value="3">Cancelled</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 m-t-10">
                                        <label>Address</label>
                                        <textarea class="form-control" name="address"></textarea>
                                     
                                    </div>
                                    <div class="form-actions col-md-12">
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                        <button type="button" class="btn btn-danger">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<?php $this->load->view('backend/footer'); ?>