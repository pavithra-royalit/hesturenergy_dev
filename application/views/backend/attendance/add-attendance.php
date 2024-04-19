<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-university" aria-hidden="true"></i>  Staff Management</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)"> Staff Management </a></li>
                        <li class="breadcrumb-item active">Add Attendance</li>
                    </ol>
                </div>
            </div>
            <div class="message"></div>

            <div class="container-fluid">
                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>attendance/Attendances" class="text-white"><i class="" aria-hidden="true"></i>  Attendance List</a></button>
                     
                    </div>
                </div>
               <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"><i class="fa fa-user-o" aria-hidden="true"></i> Add New Attendance<span class="pull-right " ></span></h4>
                            </div>
                            <?php echo validation_errors(); ?>
                               <?php echo $this->upload->display_errors(); ?>
                               
                               <?php echo $this->session->flashdata('formdata'); ?>
                               <?php echo $this->session->flashdata('feedback'); ?>
                    
                                    <?php 
                                    $empvalue = $this->staff_model->emselect();
                                    $leavevalue = $this->attendance_model->leaveselect();
                                    ?>
                            <div class="card-body">

                                <form class="row" method="post" action="Save" enctype="multipart/form-data">
                                    <div class="form-group col-md-4 m-t-10">
                                        <label>Attendance Type </label>
                                        <select name="attendance_type" class="form-control custom-select" required>
                                            <!-- <option>Select Type</option> -->
                                            <option value="Daily">Daily</option>
                                            <!-- <option value="Monthly">Monthly</option> -->
                                        
                                        </select>
                                    </div>
                                       <div class="form-group col-md-4 m-t-10">
                                        <label>Attendance Date </label>
                                        <input type="date" id="example-email2" name="attendance_date" class="form-control"   required > 
                                    </div>
                                      <div class="form-group col-md-4 m-t-10">
                                        <label>Attendance Status </label>
                                        <select name="attendance_status" class="form-control custom-select" required>
                                            <option>Select Attendance Status</option>
                                        <?Php foreach($leavevalue as $value): ?>
                                             <option value="<?php echo $value->title ?>"><?php echo $value->title ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                        
                                    </div>
                                    <div class="form-group col-md-6 m-t-10">
                                        <label>Employees</label>

                                        
                                         <select class="select2 form-control  select2-multiple" data-placeholder="Choose a Employees" tabindex="1" name="employees[]" multiple="multiple" >
                                            <?Php foreach($empvalue as $value): ?>
                                             <option value="<?php echo $value->id ?>"><?php echo $value->fullname ?></option>
                                            <?php endforeach; ?>
                                                </select>
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