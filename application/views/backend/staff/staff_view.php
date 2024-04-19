<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
                     <div class="page-wrapper">
                     <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-users" style="color:#1976d2"></i> <?php echo $basic->fullname; ?></h3>
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
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" style="font-size: 14px;">  Personal Info </a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#document" role="tab" style="font-size: 14px;"> Document</a> </li>
                            </ul>
                            <!-- Tab panes -->

                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="card">
				                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30">
                                   <?php if(!empty($basic->em_image)){ ?>
                                    <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basic->em_image; ?>" class="img-circle" width="150" />
                                    <?php } else { ?>
                                    <img src="<?php echo base_url(); ?>assets/images/users/user.png" class="img-circle" width="150" alt="<?php echo $basic->fullname ?>"/>                                   
                                    <?php } ?>
                                    <h4 class="card-title m-t-10"><?php echo $basic->fullname; ?></h4>
                                    
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6><?php echo $basic->email; ?></h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6><?php echo $basic->phone; ?></h6> 
                               
                                </div>
                            </div>                                                    
                                                </div>
                               
                                                <div class="col-md-8">
				                                <form class="row" action="Update" method="post" enctype="multipart/form-data">
				                                    
				                                  
				                                    <div class="form-group col-md-4 m-t-10">
				                                          <label> Full Name</label>
                                        <input type="text" name="fullname" class="form-control form-control-line" minlength="2" value="<?php echo $basic->fullname; ?>" required > 
				                                    </div>
				                                    <div class="form-group col-md-4 m-t-10">
				                                        <label>Email </label>
                                        <input type="email" id="example-email2" name="email" class="form-control"    value="<?php echo $basic->email; ?>" required > 
				                                    </div>
                                                    
				                                    <div class="form-group col-md-4 m-t-10">
				                                         <label>Office Shift</label>
                                                        <select name="shift_name" value="" class="form-control custom-select" required>
                                                            
                                                        <option value="<?php echo $basic->shift_name; ?>"><?php echo $basic->shift_name; ?></option>
                                                            <?Php foreach($shiftvalue as $value): ?>
                                                             <option value="<?php echo $value->shift_name ?>"><?php echo $value->shift_name ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
				                                    </div>
                                                 
                                                   
				                                    <div class="form-group col-md-4 m-t-10">
				                                        <label>Contact Number </label>
                                                   <input type="text" name="phone" class="form-control" value="<?php echo $basic->phone; ?>" minlength="10" maxlength="15" required> 
				                                    </div>
                                                
				                                    <div class="form-group col-md-4 m-t-10">
				                                         <label>Location </label>
                                                      <input type="text" id="example-email2" name="location" class="form-control"  value="<?php echo $basic->location; ?>" required > 
				                                    </div>
				                            
				                                    <div class="form-group col-md-4 m-t-10">
				                                            <label>Status </label>
                                                        <select name="status" class="form-control custom-select" required >
				                                            <option value="<?php echo $basic->status; ?>"><?php echo $basic->status; ?></option>
                                                            <option value="ACTIVE">ACTIVE</option>
                                                            <option value="INACTIVE">INACTIVE</option>
                                                        </select>
				                                    </div>
				                            <div class="form-group col-md-4 m-t-10">
				                               <label>Address</label>
                                        <textarea class="form-control" name="address"><?php echo $basic->address; ?></textarea>
                                 </div>
				                                    <div class="form-actions col-md-12">
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
                                <!--second tab-->
                                   
                                    <div class="tab-pane" id="document" role="tabpanel">
                                                                
                                    <div class="card-body">
                                          <?php
                                         $role = $this->session->userdata('user_type');
                                          ?>
                                        <form class="row" action="Add_File" method="post" enctype="multipart/form-data">
                                            <div class="form-group col-md-5 m-t-5">
                                                <label class="">File Title <span style="color:red">*</span></label>
                                                <input type="text" name="title" <?php if($this->session->userdata('user_type')=='3'){ ?> readonly <?php } ?> class="form-control" required="" aria-invalid="false" minlength="5" required>
                                            </div>
                                            <div class="form-group col-md-5 m-t-5">
                                                <label class="">File <span style="color:red">*</span></label>
                                                <input type="file" name="file_url" <?php if($this->session->userdata('user_type')=='3'){ ?> readonly <?php } ?> class="form-control" required="" aria-invalid="false" required>
                                            </div>
                                          
                                                 
                                            <div class="form-group col-md-2">
                                                <div class="col-sm-12" style="margin-top:2.5rem">
                                                    <input type="hidden" name="em_id" value="<?php echo $basic->id; ?>">                                                   
                                                    <button type="submit" class="btn btn-success">Add File</button>
                                                </div>
                                            </div>
                                     
                                        </form>
                                    </div>
                                       <div class="card-body">
                                        <div class="table-responsive ">
                                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID </th>
                                                        <th>File Title</th>
                                                        <th>File </th>
                                                        <th>Action </th>
                                                    </tr>
                                                </thead>
                                              
                                                <tbody>
                                                <?php 
                                                $i ='1';
                                                foreach($fileinfo as $value): ?>
                                                    <tr>
                                                        <td><?php echo $i++ ?></td>
                                                        <td><?php echo $value->file_title ?></td>
                                                        <td><a href="<?php echo base_url(); ?>assets/images/users/<?php echo $value->file_url ?>" target="_blank"><?php echo $value->file_url ?></a></td>
                                                         <td> <a href="#" title="Delete" class="btn btn-sm btn-info waves-effect waves-light deletexp" data-id="<?php echo $value->id ?>"><i class="fa fa-trash-o"></i></a></td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>     
                                </div>                    
                        
                                <div class="tab-pane" id="password1" role="tabpanel">
                                    <div class="card-body">
				                                <form class="row" action="Reset_Password_Hr" method="post" enctype="multipart/form-data">
				                                    <div class="form-group col-md-6 m-t-20">
				                                        <label>Password</label>
				                                        <input type="text" class="form-control" name="new1" value="" required minlength="6"> 
				                                    </div>
				                                    <div class="form-group col-md-6 m-t-20">
				                                        <label>Confirm Password</label>
				                                        <input type="text" id="" name="new2" class="form-control " required minlength="6"> 
				                                    </div>
				                                    <?php if($this->session->userdata('user_type')=='DEALER'){ ?>
                                                    <?php } else { ?>
				                                    <div class="form-actions col-md-12">
                                                    <input type="hidden" name="emid" value="<?php echo $basic->id; ?>">                                                   
				                                        <button type="submit" class="btn btn-success pull-right"> <i class="fa fa-check"></i> Save</button>
				                                    </div>
				                                    <?php } ?>
				                                </form>
                                    </div>
                                </div>
                               
                                <div class="tab-pane" id="password" role="tabpanel">
                                    <div class="card-body">
				                                <form class="row" action="Reset_Password" method="post" enctype="multipart/form-data">
				                                    <div class="form-group col-md-6 m-t-20">
				                                        <label>Old Password</label>
				                                        <input type="text" class="form-control" name="old" value="" placeholder="old password" required minlength="6"> 
				                                    </div>
				                                    <div class="form-group col-md-6 m-t-20">
				                                        <label>Password</label>
				                                        <input type="text" class="form-control" name="new1" value="" required minlength="6"> 
				                                    </div>
				                                    <div class="form-group col-md-6 m-t-20">
				                                        <label>Confirm Password</label>
				                                        <input type="text" id="" name="new2" class="form-control " required minlength="6"> 
				                                    </div>
				                                    <div class="form-actions col-md-12">
                                                    <input type="hidden" name="emid" value="<?php echo $basic->id; ?>">                                                   
				                                        <button type="submit" class="btn btn-success pull-right"> <i class="fa fa-check"></i> Save</button>
				                                    </div>
				                                </form>
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
                            url: 'docvalueDelet?id=' + iid,
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