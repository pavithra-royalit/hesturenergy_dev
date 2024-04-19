<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>

                     <div class="page-wrapper">
                     <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <!--<h3 class="text-themecolor"> <?php echo $basic->first_name .' '.$basic->last_name; ?></h3>-->
                    <h3 class="text-themecolor">Profile</h3>
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
                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills p-3 profile-tab flex-column" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" style="font-size: 14px;">  Personal Info </a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#document" role="tab" style="font-size: 14px;">KYC Document Update</a> </li>
                            
                                <?php if($this->session->userdata('user_type')=='DEALER'){ ?>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#password" role="tab" style="font-size: 14px;"> Change Password</a> </li>
                                <?php } else { ?>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#password1" role="tab" style="font-size: 14px;"> Change Password</a> </li>                                
                                <?php } ?>
                            </ul>
                            <!-- Tab panes -->
                        </div>
                    </div>
                    <div class="col-12 col-md-8 col-lg-9">
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
                                                            <img src="<?php echo base_url(); ?>assets/images/users/user.png" class="img-circle" width="150" alt="<?php echo $basic->first_name ?>" title="<?php echo $basic->first_name ?>"/>                                   
                                                            <?php } ?>
                                                            <h4 class="card-title m-t-10"><?php echo $basic->first_name .' '.$basic->last_name; ?></h4>
                                                            
                                                        </center>
                                                    </div>
                                                    <div> </div>
                                                    <!--<div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <h6>Email address</h6>
                                                                <h6 class="fw-bold"><?php echo $basic->em_email; ?></h6>
                                                            </div>
                                                            <div class="col-12">
                                                                <h6>Phone</h6>
                                                                <h6 class="fw-bold"><?php echo $basic->em_phone; ?></h6> 
                                                            </div>
                                                        </div>
                                                       
                                                        </div>-->
                                                    </div>                                                    
                                            </div>
                           
                                            <div class="col-md-8">
				                                <form class="row" action="Update" method="post" enctype="multipart/form-data">
				                                    
				                                  
				                                    <div class="form-group col-md-6 m-t-10">
				                                        <label class="fs-6">First Name</label>
				                                        <input type="text" class="form-control form-control-line" placeholder="Dealer FirstName" name="fname" value="<?php echo $basic->first_name; ?>" <?php if($this->session->userdata('user_type')=='DEALER'){ ?> readonly <?php } ?> minlength="3" required> 
				                                    </div>
				                                    <div class="form-group col-md-6 m-t-10">
				                                        <label class="fs-6">Last Name </label>
				                                        <input type="text" id="" name="lname" class="form-control form-control-line" value="<?php echo $basic->last_name; ?>" placeholder="Dealer LastName" <?php if($this->session->userdata('user_type')=='DEALER'){ ?> readonly <?php } ?>  required> 
				                                    </div>
                                                    
				                                    <div class="form-group col-md-6 m-t-10">
				                                        <label class="fs-6">Gender </label>
				                                        <select name="gender" <?php if($this->session->userdata('user_type')=='DEALER'){ ?> readonly <?php } ?> class="form-control custom-select">
				                                           
				                                            <option value="<?php echo $basic->em_gender; ?>"><?php echo $basic->em_gender; ?></option>
				                                            <option value="Male">Male</option>
				                                            <option value="Female">Female</option>
				                                        </select>
				                                    </div>
                                                 
                                                    <?php if($this->session->userdata('user_type')=='DEALER'){ ?>  <?php } else { ?> 
                                                    <div class="form-group col-md-6 m-t-10">
                                                        <label class="fs-6">Status </label>
                                                        <select name="status" <?php if($this->session->userdata('user_type')=='DEALER'){ ?> readonly <?php } ?> class="form-control custom-select" required >
				                                            <option value="<?php echo $basic->status; ?>"><?php echo $basic->status; ?></option>
                                                            <option value="ACTIVE">ACTIVE</option>
                                                            <option value="INACTIVE">INACTIVE</option>
                                                        </select>
                                                    </div>
                                                    <?php } ?>				                                    
				                                    
				                                    <div class="form-group col-md-6 m-t-10">
				                                        <label class="fs-6">Contact Number </label>
				                                        <input type="text" class="form-control" placeholder="" name="contact" <?php if($this->session->userdata('user_type')=='DEALER'){ ?> readonly <?php } ?> value="<?php echo $basic->em_phone; ?>" minlength="10" maxlength="15" required> 
				                                    </div>
                                                   <?php if($this->session->userdata('user_type')=='DEALER'){ ?>  <?php } else { ?> 				                                    
				                                  
				                                    <?php } ?>
				                                    <div class="form-group col-md-6 m-t-10">
				                                        <label class="fs-6">GST Number </label>
				                                        <input type="text" <?php if($this->session->userdata('user_type')=='DEALER'){ ?> readonly <?php } ?> id="example-email2" name="gst" class="form-control" value="<?php echo $basic->em_gst; ?>" placeholder=""> 
				                                    </div>
				                            
				                                    <div class="form-group col-md-6 m-t-10">
				                                        <label class="fs-6">Email </label>
				                                        <input type="email" id="example-email2" name="email" class="form-control" <?php if($this->session->userdata('user_type')=='DEALER'){ ?> readonly <?php } ?> value="<?php echo $basic->em_email; ?>" placeholder="email@mail.com" minlength="7" required> 
				                                    </div>
				                                    
				                                       <div class="form-group col-md-6 m-t-10">
				                                        <label class="fs-6">Address </label>
				                       <textarea id="example-email2" name="address" class="form-control" <?php if($this->session->userdata('user_type')=='DEALER'){ ?> readonly <?php } ?>  placeholder="Address"  row="2" required><?php echo $basic->address; ?> </textarea> 
				                                    </div>
				                            
                                                    <?php //if($this->session->userdata('user_type')=='DEALER'){ ?>
                                                    <?php //} else { ?>
				                                    <div class="form-actions col-md-12 m-auto text-center">
                                                        <input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">
				                                        <button type="submit" class="btn btn-success rounded">Save</button>
				                                        <button type="button" class="btn btn-danger rounded ml-3">Cancel</button>
				                                    </div>
				                                    <?php //} ?>
				                                </form>
                                            </div>
                                          
                                        </div>
			                        </div>
                                </div>
                            </div>
                            <!--second tab-->
                               
                                <div class="tab-pane" id="document" role="tabpanel">
                                   <div class="card">                         
                                <div class="card-body">
                                      <?php
                                         $doc_status = $basic->doc_status;
                                     $role = $this->session->userdata('user_type');
                                      if(($doc_status == '0' || $doc_status == '3') && $role == "DEALER" || $role == "ADMIN" ){?>
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
                                                <input type="hidden" name="em_id" value="<?php echo $basic->em_id; ?>">                                                   
                                                <button type="submit" class="btn btn-success">Add File</button>
                                            </div>
                                        </div>
                                        <?php }else if($doc_status == '2' && $role == "DEALER") { ?>
                                        <p style="color:red"> Note : Your request has been approved, you will not be able to perform any actions.. If there are any changes, please contact the administrator
</p>
                                        <?php } ?>
                                    </form>
                                    <div class="table-responsive ">
                                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr class="bg-themecolor text-white">
                                                    <th>ID </th>
                                                    <th>File Title</th>
                                                    <th>File </th>
                                                      <?php if($role == "DEALER" &&  $doc_status == '2' ){ } else { ?>
                                                    <th>Action </th>
                                                    <?php } ?>
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
                                                    <?php if($role == "DEALER" &&  $doc_status == '2' ){ } else { ?>
                                                     <td> 
                                                      <a href="" title="Edit"  class="btn btn-sm btn-primary waves-effect waves-light holiday" data-id="<?php echo $value->id; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                     <a href="#" title="Delete" class="btn btn-sm btn-info waves-effect waves-light deletexp" data-id="<?php echo $value->id ?>"><i class="fa fa-trash-o"></i></a></td>
                                              <?php } ?>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                     <?php 
                                    $this->db->where('em_id',$basic->em_id);
                                    $this->db->from("employee_file");
                                    $doc_count = $this->db->count_all_results(); 
                                    
                                       if(($doc_status == '0' || $doc_status == '3') && $role == "DEALER" && $doc_count > 0){
                                       ?>
                                         <form class="row" action="document_approval" method="post" >
                                        <div class="form-group col-md-5 m-t-5">
                                         
                                            <input type="hidden" name="doc_status" value="1">
                                        </div>
                                      
                                        <div class="form-group col-md-2">
                                            <div class="col-sm-12" style="margin-top:2.5rem">
                                                <input type="hidden" name="em_id" value="<?php echo $basic->em_id; ?>">                                                   
                                                <button type="submit" class="btn btn-success">Submit For Approval</button>
                                            </div>
                                        </div>
                                           </form>
                                       <?php }  else if($doc_status == '1' && $role == "DEALER"){ ?>
                                        <div class="form-group col-md-2">
                                            <div class="col-sm-12" style="margin-top:2.5rem">
                                                <button  class="btn btn-warning" disabled>Waiting for Admin Approval</button>
                                            </div>
                                        </div>
                                        <?php }  else if($doc_status == '1' && $role == "ADMIN"){ ?>
                                        <div class="form-actions col-md-12" style="display:flex">
                                             <!-- approve button code start -->
                                            <form class="row" action="document_approval" method="post" >
                                               
                                                 
                                                    <input type="hidden" name="doc_status" value="2">
                                               
                                                   <input type="hidden" name="em_id" value="<?php echo $basic->em_id; ?>">    
			                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Approve </button>

			                                </form> &nbsp;
			                                <!-- approve button code end  -->
			                                <!-- Reject Button start-->
			                                 <form class="row" action="document_approval" method="post" >
                                               
                                                 
                                                    <input type="hidden" name="doc_status" value="3">
                                               
                                                   <input type="hidden" name="em_id" value="<?php echo $basic->em_id; ?>">    
			                                        <button type="submit" class="btn btn-danger" style="margin-left:50px;"> <i class="fa fa-times"></i> Reject </button>

			                                </form>
			                                   <!-- Reject Button end-->
                                        </div>
                                       
                                        <?php } ?>
                                  </div>
                                </div>     
                            </div>                    
                    
                                <div class="tab-pane" id="password1" role="tabpanel">
                                    <div class="card">
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
                                                <input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">                                                   
			                                        <button type="submit" class="btn btn-success pull-right"> <i class="fa fa-check"></i> Save</button>
			                                    </div>
			                                    <?php } ?>
			                                </form>
                                        </div>
                                    </div>
                                </div>
                           
                                <div class="tab-pane" id="password" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
			                                <form class="row" action="Reset_Password" method="post" enctype="multipart/form-data">
			                                    <div class="form-group col-md-6 m-t-20">
			                                        <label>Old Password</label>
			                                        <input type="text" class="form-control" name="old" value="" placeholder="old password" required minlength="6"> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-20">
			                                        <label>New Password</label>
			                                        <input type="text" class="form-control" name="new1" value="" placeholder="new password" required minlength="6"> 
			                                    </div>
			                                    <div class="form-group col-md-6 m-t-20">
			                                        <label>Confirm New Password</label>
			                                        <input type="text" id="" name="new2" class="form-control " placeholder="confirm new password" required minlength="6"> 
			                                    </div>
			                                    <div class="form-actions col-md-12 m-auto text-center">
                                                <input type="hidden" name="emid" value="<?php echo $basic->em_id; ?>">                                                   
			                                        <button type="submit" class="btn btn-success pull-center"> Save</button>
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

    <div class="modal fade" id="holysmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">KYC Document Update</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Add_File" id="roleform" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        
                                            <div class="form-group">
                                                <label class="control-label">File Title</label>
                                                <input type="text" name="title" class="form-control" id="recipient-name1" value="" required>
                                                 <input type="hidden" name="em_id" value="<?php echo $basic->em_id; ?>">    
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label">File</label>
                                                 <input type="file" name="file_url" class="form-control" id="recipient-name1" value="" required>
                                           
                                       
                                            </div>                
                                        
                                    </div>
                                    <div class="modal-footer">
                                    <input type="hidden" name="id" value="" class="form-control" id="recipient-name1">     
                                                               
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

<script type="text/javascript">
            $(document).ready(function () {
                $(".holiday").click(function (e) {
                    e.preventDefault(e);
                    // Get the record's ID via attribute  
                    var iid = $(this).attr('data-id');
                    $('#roleform').trigger("reset");
                    $('#holysmodel').modal('show');
                    $.ajax({
                        url: 'KYCbyib?id=' + iid,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                    }).done(function (response) {
                        console.log(response);
                        // Populate the form fields with the data returned from server
						$('#roleform').find('[name="id"]').val(response.rolevalue.id).end();
                        $('#roleform').find('[name="title"]').val(response.rolevalue.file_title).end();
                          $('#roleform').find('[name="file_url"]').val(response.rolevalue.file_url).end();
                           $('#roleform').find('[name="file"]').val(response.rolevalue.file_url).end();
                          
                      
					});
                });
            });
</script>

<?php $this->load->view('backend/footer'); ?>