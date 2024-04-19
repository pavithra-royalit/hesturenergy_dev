
<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>

<style>
    .fc-fri {
        background-color: #FFEB3B;
    }
    .fc-event, .fc-event-dot {
        background-color: #FF5722;
    }
    .fc-event {
        border: 0;
    }
    .fc-day-grid-event {
        margin: 0;
        padding: 0;
    }
    .dayWithEvent {
        background: #FFEB3B;
        cursor: pointer;
    }
</style>
         <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-bullhorn" style="color:#1976d2"></i> Vehicle</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Vehicle</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">


                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a data-toggle="modal" data-target="#holysmodel" data-whatever="@getbootstrap" class="text-white"><i class="" aria-hidden="true"></i> Add Vehicle </a></button>
                     
                    </div>
                </div>  
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Vehicle List  </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>S.no</th>
                                                <th>Vehicle Name</th>
                                                <th>Vehicle Price</th>
                                                <th>GST (%)</th>
                                                <th>Vehicle Model</th>
                                                <th>Created Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                           <?php
                                           $i=1;
                                           foreach($vehicle as $value) { 
                                  
                                           ?>
                                            <tr>
                                                   <td><?php echo $i++ ?></td>
                                                <td><?php echo $value->vehicle_name ?></td>
                                                <td><?php echo $value->vehicle_price ?></td>
                                                 <td><?php echo $value->gst ?></td>
                                                <td><?php echo $value->model ?></td>
                                                <td><?php echo $value->created_date ?></td>
                                                <td class="jsgrid-align-center ">
                                                    <a href="" title="Edit"  class="btn btn-sm btn-primary waves-effect waves-light holiday" data-id="<?php echo $value->id; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a onclick="confirm('Are you sure, you want to delete this?')" href="#" title="Delete"  class="btn btn-sm btn-danger waves-effect waves-light holidelet" data-id="<?php echo $value->id; ?>"><i class="fa fa-trash-o"></i></a>
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
                        <div class="modal fade" id="holysmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Vehicle</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Add_Vehicle" id="roleform" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        
                                            <div class="form-group">
                                                <label class="control-label">Name of Vehicle</label>
                                                <input type="text" name="vehicle_name" class="form-control" id="recipient-name1" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Vehicle Price</label>
                                                <input type="text" name="vehicle_price" class="form-control" id="recipient-name1" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Vehicle GST (%)</label>
                                                <input type="text" name="gst" class="form-control" id="recipient-name1" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Model</label>
                                                <input type="text" name="model" class="form-control" id="recipient-name1" value="" required>
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
                                                    url: 'Vehiclebyib?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#roleform').find('[name="id"]').val(response.vehiclevalue.id).end();
                                                    $('#roleform').find('[name="vehicle_name"]').val(response.vehiclevalue.vehicle_name).end();
                                                    $('#roleform').find('[name="vehicle_price"]').val(response.vehiclevalue.vehicle_price).end();
                                                      $('#roleform').find('[name="gst"]').val(response.vehiclevalue.gst).end();
                                                    $('#roleform').find('[name="model"]').val(response.vehiclevalue.model).end();
												});
                                            });
                                        });
</script>
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $(".holidelet").click(function (e) {
                                                e.preventDefault(e);
                                                // Get the record's ID via attribute  
                                                var iid = $(this).attr('data-id');
                                                $.ajax({
                                                    url: 'VEHvalueDelet?id=' + iid,
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
<?php $this->load->view('backend/footer'); ?>