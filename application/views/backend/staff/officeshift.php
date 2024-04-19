<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
                     <div class="page-wrapper">
                     <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-users" style="color:#1976d2"></i>  Office Shift  </h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                             <li class="breadcrumb-item"><a href="javascript:void(0)">Staff Management</a></li>
                        <li class="breadcrumb-item active"> Office Shift  </li>
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
                                             
                               
                                                <div class="col-md-12">
				                              
                                                <div class="card-body">
			                                <form class="row" action="Add_shift" method="post" enctype="multipart/form-data">
			                                    	<div class="form-group col-md-3">
			                                    	    <label>Shift Name </label>
                                                        <input type="text" name="shift_name" class="form-control form-control-line"  required > 
			                                   
			                                    	</div>
                                                    <div class="form-group col-md-3">
			                                    	    <label> Shift From</label>
                                                        <input type="text" name="shift_from" class="form-control form-control-line"  required > 
			                                   
			                                    	</div>
                                                    <div class="form-group col-md-3">
			                                    	    <label>Shift To </label>
                                                        <input type="text" name="shift_to" class="form-control form-control-line"  required > 
			                                   
			                                    	</div>
			                                    
			                                    	
			                                    
			                                
		                                    	<div class="form-actions col-md-3">
                                                                                             
		                                    	    <button type="submit" class="btn btn-success m-t-20"> <i class="fa fa-check"></i> Save</button>
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
                                            <h3>Office Shift List</h3>
                                            <div class="table-responsive ">
                                                <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>ID </th>
                                                            <th>Shift Name</th>
                                                            <th>Shift From</th>
                                                            <th>Shift To</th>
                                                            <th>Created Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                    <?php
                                                    $i ='1';
                                                    foreach($shift as $value){
                                                    $date = $value->created_date;
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $value->shift_name ?></td>
                                                            <td><?php echo $value->shift_from ?></td>
                                                            <td><?php echo $value->shift_to ?></td>
                                                            <td><?php echo date('d-m-Y',strtotime($date)) ?></td>
                                                            <td class="jsgrid-align-center ">
                                                            
                                                                <a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light office_sift" data-id="<?php echo $value->id ?>"><i class="fa fa-pencil-square-o"></i></a>
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
                                            $(".office_sift").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $('#officemodal').trigger("reset");
                                                $('#ShiftModal').modal('show');
                                                $.ajax({
                                                    url: 'shiftbyib?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#officemodal').find('[name="id"]').val(response.shiftvalue.id).end();
                                                    $('#officemodal').find('[name="shift_name"]').val(response.shiftvalue.shift_name).end();
                                                    $('#officemodal').find('[name="shift_from"]').val(response.shiftvalue.shift_from).end();
                                                    $('#officemodal').find('[name="shift_to"]').val(response.shiftvalue.shift_to).end();
                                                  
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
                                                    url: 'shiftvalueDelet?id=' + iid,
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