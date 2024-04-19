<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
                     <div class="page-wrapper">
                     <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-users" style="color:#1976d2"></i> View Lead</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Leads</li>
                    </ol>
                </div>
            </div>
       
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                         

                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="card">
				                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                        <div class="card">
                     
                            <div class="card-body"> 
                                <small class="text-muted">Lead Source </small>
                                <h6><?php echo $basic->lead_from; ?></h6>
                                <hr>
                                <small class="text-muted p-t-5 db">Lead Details</small>
                                <h6> Name : <?php echo $basic->fname; ?></h6> 
                                <h6>Email : <?php echo $basic->email; ?></h6> 
                                <h6>Mobile : <?php echo $basic->mobile; ?></h6> 
                                <hr>
                                <small class="text-muted p-t-5 db">Address</small>
                                <h6><?php echo $basic->address; ?></h6> 
                                <hr>
                                <small class="text-muted p-t-5 db">Followup Date</small>
                                <h6><?php echo $basic->follow_up_date; ?></h6> 
                                <small class="text-muted p-t-5 db">Created Date</small>
                                <h6><?php echo $basic->created_date; ?></h6> 
                                <hr>
                                <small class="text-muted p-t-5 db">Status</small>
                              <?php  $status=$basic->status_id;
                                if($status == '1'){
                                    $status_name = "In Progress";
                                    $color="orange";
                                } else if($status == '2'){
                                    $status_name = "Completed";
                                    $color="green";
                                }else if($status == '3'){
                                    $status_name = "Cancelled";
                                    $color="red";
                                }
                                ?>
                                <h6 style=font-weight:bold;color:<?php echo $color;?>><?php echo $status_name; ?></h6> 
                               
                                </div>
                            </div> 

                                                </div>
                               
                                                <div class="col-md-6">
				                              
                                                <div class="card-body">
			                                <form class="row" action="Add_notes" method="post" enctype="multipart/form-data">
			                                    	<div class="form-group col-md-12 m-t-5">
			                                    	    <label> Add Notes </label>
                                                        <textarea name="notes" class="form-control form-control-line " required></textarea>
			                                   
			                                    	</div>
			                                    
			                                    	
			                                    
			                                
		                                    	<div class="form-actions col-md-12">
                                                    <input type="hidden" name="emid" value="<?php echo $basic->id; ?>">                                                
		                                    	    <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
		                                    	</div>
		                                    	
			                                </form>
					                    </div>

                                                </div>
                                              
                                        </div>
				                        </div>
                                    </div>
                                </div>
                                                                                     
                            </div>
                        </div>


                        <div class="tab-pane">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3>TimeLine List</h3>
                                            <div class="table-responsive ">
                                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>ID </th>
                                                            <th>Notes</th>
                                                            <th>Created Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                    <?php
                                                    $i ='1';
                                                    foreach($notes as $value){?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $value->notes ?></td>
                                                            <td><?php echo $value->created_date ?></td>
                                                            <td class="jsgrid-align-center ">
                                                            
                                                                <a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light lead_notes" data-id="<?php echo $value->id ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                                <a onclick="confirm('Are you sure, you want to delete this?')" href="#" title="Delete" class="btn btn-sm btn-info waves-effect waves-light deletexp" data-id="<?php echo $value->id ?>"><i class="fa fa-trash-o"></i></a>
                                                                
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>                                     
	                              
                                    </div>
                                </div>


                    </div>
                    <!-- Column -->
                </div>
          
                <?php $this->load->view('backend/em_modal'); ?>    
                <script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".lead_notes").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#notesmodal').trigger("reset");
                                                $('#ExpModal').modal('show');
                                                $.ajax({
                                                    url: 'notesbyib?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#notesmodal').find('[name="id"]').val(response.notesvalue.id).end();
                                                    $('#notesmodal').find('[name="notes"]').val(response.notesvalue.notes).end();
                                                  
                                                    $('#notesmodal').find('[name="emid"]').val(response.notesvalue.emp_id).end();
												});
                                            });
                                        });
</script>                
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".deletexp").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $.ajax({
                                                    url: 'notesvalueDelet?id=' + iid,
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
<script>
 CKEDITOR.replace('des');
</script>

<?php $this->load->view('backend/footer'); ?>