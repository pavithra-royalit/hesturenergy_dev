<!-- https://github.com/eboominathan/Basic-Crud-in-Full-Calendar-Using-Codeigniter-3.0.3/tree/master/fullcalendar
https://www.patchesoft.com/fullcalendar-with-php-and-codeigniter/
 -->
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
                    <h3 class="text-themecolor">Customers</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Customers</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
 
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4 class="m-b-0"> Customer List  </h4>
                                    <a data-toggle="modal" type="button" data-target="#holysmodel" data-whatever="@getbootstrap" class="text-white btn btn-info">
                                       <i class="fa fa-plus"></i>
                                        Add </a>
                                </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-bordered mt-3" cellspacing="0" width="100%">
                                        <thead>
                                            <tr class="bg-themecolor text-white">
                                                <th>Sno</th>
                                                <th>Name</th>
                                                <!-- <th>State </th>
                                                <th>City </th>
                                                <th>Zip</th> -->
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                           <?php
                                           $i=1;
                                           foreach($customer as $value): ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo $value->name ?></td>
                                                <!-- <td><?php echo $value->state ?></td>
                                                <td><?php echo $value->city; ?></td>
                                                <td><?php echo $value->zip; ?></td> -->
                                                <td><?php echo $value->phone; ?></td>
                                                <td><?php echo $value->email; ?></td>
                                                <td class="jsgrid-align-center ">
                                                <a href="<?php echo base_url(); ?>customer/customerview?I=<?php echo base64_encode($value->id); ?>" title="View" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></a> 

                                               
                                                           <!-- <a href="<?php echo base_url(); ?>pos/Add_quotation?id=<?php echo $value->id; ?>" title="View" class="btn btn-sm btn-info waves-effect waves-light"><i class="fa fa-eye"></i></a>  -->
                                                    <a href="" title="Edit"class="btn btn-sm btn-warning waves-effect waves-light holiday" data-id="<?php echo $value->id; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a onclick="confirm('Are you sure, you want to delete this?')" href="#" title="Delete"  class="btn btn-sm btn-danger waves-effect waves-light holidelet" data-id="<?php echo $value->id; ?>"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        <div class="modal fade bd-example-modal-lg" id="holysmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Add Customer</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Add_Customers" id="holidayform" enctype="multipart/form-data">
                                    <div class="modal-body row">
                                        
                                            <div class="form-group col-md-6">
                                            <label class="control-label">Customer Name</label>
                                             <input type="text" name="name" class="form-control" id="recipient-name1" value="" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label class="control-label">Email</label>
                                       <input type="email" name="email" class="form-control " id="recipient-name1"  value="" >
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label class="control-label">Mobile Number</label>
                                         <input type="number" name="phone" class="form-control " id="recipient-name1" value="" >
                                            </div>                                        
                                            <div class="form-group col-md-6">
                                            <label class="control-label">State</label>
                                           <input type="text" name="state" class="form-control" id="recipient-name1"  required>
                                            </div>    
                                            <div class="form-group col-md-6">
                                            <label for="message-text" class="control-label"> City</label>
                                           <input class="form-control " name="city" id="message-text1" required>
                                            </div>    
                                            <div class="form-group col-md-6">
                                            <label for="message-text" class="control-label"> Zip Code</label>
                                           <input class="form-control " name="zip" id="message-text1" required>
                                            </div>    
                                            <div class="form-group col-md-6">
                                            <label for="message-text" class="control-label"> Company Name</label>
                                          <input class="form-control " name="company_name" id="message-text1" required>
                                            </div>    
                                            <div class="form-group col-md-6">
                                            <label for="message-text" class="control-label">GST (%) </label>
                                       <input class="form-control " name="gst" id="message-text1" required>
                                            </div>  
                                           
                                            <div class="form-group col-md-12">
                                            <label for="message-text" class="control-label">Address</label>
                                           <textarea class="form-control " name="address" id="message-text1" required></textarea>
                                            </div>    
                                    </div>
                                      <?php 
                        $id = $this->session->userdata('user_login_id');
                        $basicinfo = $this->employee_model->GetBasic($id); 
                        ?>      
                                    <div class="modal-footer">
                                         <input type="hidden" name="id" value="" class="form-control" id="recipient-name1">    
                                         <input type="hidden" name="did" value="<?php echo $basicinfo->id ?>" class="form-control" id="recipient-name1">                                       
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
                                                $('#holidayform').trigger("reset");
                                                $('#holysmodel').modal('show');
                                                $.ajax({
                                                    url: 'Customerbyib?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#holidayform').find('[name="id"]').val(response.holidayvalue.id).end();
                                                    $('#holidayform').find('[name="name"]').val(response.holidayvalue.name).end();
                                                    $('#holidayform').find('[name="address"]').val(response.holidayvalue.address).end();
                                                    $('#holidayform').find('[name="city"]').val(response.holidayvalue.city).end();
                                                    $('#holidayform').find('[name="state"]').val(response.holidayvalue.state).end();
                                                    $('#holidayform').find('[name="zip"]').val(response.holidayvalue.zip).end();
                                                    $('#holidayform').find('[name="phone"]').val(response.holidayvalue.phone).end();
                                                    $('#holidayform').find('[name="email"]').val(response.holidayvalue.email).end();
                                                    $('#holidayform').find('[name="company_name"]').val(response.holidayvalue.company_name).end();
                                                    $('#holidayform').find('[name="gst"]').val(response.holidayvalue.gst).end();
                                                   
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
                                                    url: 'CUSvalueDelet?id=' + iid,
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