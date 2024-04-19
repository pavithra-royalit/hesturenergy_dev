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
                    <h3 class="text-themecolor"><i class="fa fa-bullhorn" style="color:#1976d2"></i> Customers</h3>
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


                <!-- <div class="row m-b-10"> 
                    <div class="col-12">
                          <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>pos/Add_quotation?id=<?php echo $cid; ?>" class="text-white"><i class="" aria-hidden="true"></i> Add Quotation</a></button>
                      
                     
                    </div>
                </div>   -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Jobcard List  </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                           
                                            <tr>
                                              <th>SNo </th>
                                              <th>JobCard No </th>
                                              <th>Service Type</th>
                                              <th>Customer Name</th>
                                              <th> Service Date </th>
                                             <th>Status</th>
                                              <th>Action </th>
                                          </tr>
                                        </thead>
                                      
                                         <tbody>
                                                  <?php
                                                   $i=1;
                                                   foreach($jobcard as $value) { 
                                                        $date = $value->outdate;
                                                        $status = $value->status;
                                                
                                                   ?>
                                                    <tr>
                                                   <td><?php echo $i++ ?></td>
                                                   <td><?php echo $value->job_code ?></td>
                                                   <td><?php echo $value->service_type ?></td>
                                                   <td><?php echo $value->cid ?></td>
                                                   <td><?php echo date('d-m-Y',strtotime($date)) ?></td>
                                                    <td><?php echo $value->status ?></td>
                                              
                                                <td class="jsgrid-align-center ">

                                                
                                                   
                                              
                                                <?php if($status == "Completed"){ ?>
                                                 <a href="<?php echo base_url(); ?>customer/gatepass?I=<?php echo base64_encode($value->cid) ?>&id=<?php echo $value->job_code ?>" title="Gate Pass"  class="btn btn-sm btn-info waves-effect waves-light " "><i class="fa fa-eye"></i></a>
                                              <?php } ?>
                                                  
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
                <?php $customervalue = $this->customer_model->GetAllCustomerInfo(); 
            
                ?>
                        <div class="modal fade bd-example-modal-lg" id="holysmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Add Quotation</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Add_Pos" id="holidayform" enctype="multipart/form-data">
                                    <div class="modal-body row">
                                        
                                            <div class="form-group col-md-6">
                                           
                                        <label>Customer Name</label>
                                        <select name="customer_id" value="" class="form-control custom-select" required>
                                            <option>Select Customer Name</option>
                                            <?Php foreach($customervalue as $value){ 
                                             
                                                  $sql = "SELECT name,email FROM `customer`   WHERE id='$value->id'";
                                                  $query=$this->db->query($sql);
                                                   $result = $query->result();       
                                                   foreach($result as $value1){ 
                                                     $name=$value1->name;
                                                     $email=$value1->email;
                                                   }      
                                                ?>
                                             <option value="<?php echo $value->id ?>"><?php echo $name ?></option>
                                        
                                                <?php } ?>
                                        </select>
                                    </div>

                                            <div class="form-group col-md-6">
                                            <label class="control-label">Date</label>
                                       <input type="date" name="date" class="form-control " id="recipient-name1"  value="" >
                                            </div>
                                           
                                            <div class="form-group col-md-12">
                                            <label class="control-label">Vehicle Name</label>
                                         <input type="text" name="vehicle_name" class="form-control " id="recipient-name1" value="" >
                                            </div>  
                                            <div class="form-group col-md-6">
                                            <label class="control-label">Vehicle Price</label>
                                         <input type="text" name="vehicle_price" class="form-control " id="recipient-name1" value="" >
                                            </div>       
                                            <div class="form-group col-md-6">
                                            <label class="control-label">Number Plate</label>
                                         <input type="text" name="number_plate" class="form-control " id="recipient-name1" value="" >
                                            </div>  
                                            <div class="form-group col-md-6">
                                            <label class="control-label">Service Type</label>
                                            <select name="service_type" class="form-control custom-select" required>
                                            <option>Select Gender</option>
                                            <option value="Free">Free</option>
                                            <option value="Paid">Paid</option>
                                        </select>
                                            </div>                                        
                                            <div class="form-group col-md-6">
                                            <label class="control-label">Fix Service Charge</label>
                                         <input type="number" name="fixed_service_charge" class="form-control " id="recipient-name1" value="" >
                                            </div>                                         
                                            <div class="form-group col-md-12">
                                            <label for="message-text" class="control-label">Details</label>
                                           <textarea class="form-control " name="details" id="message-text1" required></textarea>
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
                                                $('#holidayform').trigger("reset");
                                                $('#holysmodel').modal('show');
                                                $.ajax({
                                                    url: 'Posbyib?id=' + iid,
                                                    method: 'GET',
                                                    data: '',
                                                    dataType: 'json',
                                                }).done(function (response) {
                                                    console.log(response);
                                                    // Populate the form fields with the data returned from server
													$('#holidayform').find('[name="id"]').val(response.holidayvalue.id).end();
                                                    $('#holidayform').find('[name="customer_id"]').val(response.holidayvalue.customer_id).end();
                                                    $('#holidayform').find('[name="date"]').val(response.holidayvalue.date).end();
                                                    $('#holidayform').find('[name="vehicle_name"]').val(response.holidayvalue.vehicle_name).end();
                                                    $('#holidayform').find('[name="vehicle_price"]').val(response.holidayvalue.vehicle_price).end();
                                                    $('#holidayform').find('[name="number_plate"]').val(response.holidayvalue.number_plate).end();
                                                    $('#holidayform').find('[name="service_type"]').val(response.holidayvalue.service_type).end();
                                                    $('#holidayform').find('[name="fixed_service_charge"]').val(response.holidayvalue.fixed_service_charge).end();
                                                    $('#holidayform').find('[name="details"]').val(response.holidayvalue.details).end();
                                                   
                                                   
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