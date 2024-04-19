<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
                     <div class="page-wrapper">
                     <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-users" style="color:#1976d2"></i> <?php echo $basic->name; ?></h3>
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
                <div class="col-1 col-md-1 col-lg-1"></div>
                    <div class="col-10 col-md-10 col-lg-10">
                        <div class="card">
                            <!-- Nav tabs -->

                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link "  href="<?php echo base_url(); ?>customer/customerview?I=<?php echo base64_encode($basic->id); ?>"  style="font-size: 14px;"> Customer Info </a> </li>
                                <li class="nav-item"> <a class="nav-link"  href="<?php echo base_url(); ?>customer/posview?I=<?php echo base64_encode($basic->id); ?>"  style="font-size: 14px;"> Po's </a> </li>
                                <li class="nav-item"> <a class="nav-link active"  href="<?php echo base_url(); ?>customer/invoiceview?I=<?php echo base64_encode($basic->id); ?>" style="font-size: 14px;"> Invoice </a> </li>
                                <li class="nav-item"> <a class="nav-link"  href="<?php echo base_url(); ?>customer/jobcardview?I=<?php echo base64_encode($basic->id); ?>"  style="font-size: 14px;"> Job Card</a> </li>
                                <li class="nav-item"> <a class="nav-link"  href="<?php echo base_url(); ?>customer/notesview?I=<?php echo base64_encode($basic->id); ?>"  style="font-size: 14px;"> Notes</a> </li>
                              
                            </ul>

                            </div>
                    </div>
                    <div class="col-1 col-md-1 col-lg-1"></div>
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="tab-content">
                           
                            <!--second tab-->
                          
                                <div class="tab-pane active" id="pos" role="tabpanel">
                                <div class="row" id="addon">
                                <div class="col-md-1"></div>
                                      <div class="col-md-10">
                                      <div class="card">
                                      <div class="card-body">
                                         <h4 class="text-center p-b-3" style="color:#13637c"> Invoice List  </h4>

                                         <button type="button" class="btn btn-info float-right mb-2" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Add Invoice</button>
                                                                                                     
                                         <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                  <thead>
                                                      <tr>
                                                          <th>SNo </th>
                                                          <th>Vehicle Name </th>
                                                          <th>Model </th>
                                                          <th>Invoice Number </th>
                                                        
                                                          <th>Amount (₹)</th>
                                                          <th>Created Date</th>
                                                          <th>Action </th>
                                                      </tr>
                                                  </thead>
                                                  
                                                  
                                                  <tbody>
                                                    <?php
                                                   $i=1;
                                                   foreach($invoice as $value) { 
                                                        $date = $value->created_date;
                                                        $sql = "SELECT * FROM `tbl_vehicle`  WHERE id='$value->vehicle_id'";
                                                        $query=$this->db->query($sql);
                                                        $result = $query->result();       
                                                        foreach($result as $value1){ 
                                                            $name1=$value1->vehicle_name;
                                                                                                
                                                        }      
                                                   ?>
                                                  <tr>
                                                   <td><?php echo $i++ ?></td>
                                                <td><?php echo $name1 ?></td>
                                                <td><?php echo $value->model ?></td>
                                                <td><?php echo $value->inov_num ?></td>
                                                <td><?php echo $value->amount ?></td>
                                                   <td>    <?php echo date('d-m-Y',strtotime($date)) ?></td>
                                                <td class="jsgrid-align-center ">
                                                    <a href="" title="Edit"  class="btn btn-sm btn-primary waves-effect waves-light holiday" data-id="<?php echo $value->id; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="<?php echo base_url(); ?>customer/viewinvoice?I=<?php echo base64_encode($value->cid) ?>&id=<?php echo $value->inov_num ?>" title="Invoice"  class="btn btn-sm btn-warning waves-effect waves-light " "><i class="fa fa-eye"></i></a>

                                                  
                                                </td>
                                            </tr>
                                            <?php } ?>
                                     
                                                    
                                                  </tbody>
                                              </table>
                                          </div>
                                
                                       </div>   
                                     </div>
                                </div>   
                                <div class="col-md-1"></div>
                              </div>
                                   
                            </div>                    
                    
                          
                           
                        
                       
                        </div>
                    </div>
                    </div>
                    <!-- Column -->
                </div>
          
 
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Invoice</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Add_single_Invoice" id="roleform" >
                                    <div class="modal-body row">
                                 
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Name of Vehicle</label>
                                                    <select name="vehicle_id" class="form-control custom-select" id="pp" required>
                                                        <option value="">Select Vehicle</option>
                                                        <?Php foreach($vehicle as $value){ 

                                                             $sql = "SELECT * FROM `tbl_vehicle`  WHERE id='$value->vehicle_name'";
                                                             $query=$this->db->query($sql);
                                                             $result = $query->result();       
                                                             foreach($result as $value1){ 
                                                                 $name1=$value1->vehicle_name;
                                                                                                     
                                                             }      
                                                            ?>
                                                        <option value="<?php echo $value->vehicle_name ?>"><?php echo $name1 ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Vehicle Model</label>
                                                    <input type="text" name="model" class="form-control" id="recipient-name1" value="" readonly>
                                                </div>
                                                <!--<div class="form-group col-md-6">-->
                                                <!--    <label class="control-label">Number Plate</label>-->
                                                <!--    <input type="text" name="number_plate" class="form-control" id="recipient-name1" value="" readonly>-->
                                                <!--</div>-->
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Amount</label>
                                                    <input type="text" name="amount" class="form-control " id="recipient-name1" value=""  required>
                                                
                                                </div>  
                                                <div class="form-group col-md-6">
                                                    <label class="control-label">Service Type</label>
                                                  <select class="form-control " name="service_type" required>
                                                    <option value="">Select</option>
                                                        <option value="Paid">Paid</option>
                                                        <option value="Un-Paid">Un-Paid</option>  
                                                
                                                </select>
                                                </div>            
                                        
                                    </div>
                                    <div class="modal-footer">
                                    <input type="hidden" name="id" value="" class="form-control" id="recipient-name1">     
                                     <input type="hidden" name="cid" value="<?php echo $basic->id ?>" class="form-control" id="recipient-name1">                                       
                                     <input type="hidden" name="inov_num" value="" class="form-control" id="recipient-name1">    
                                      <?php  $id = $this->session->userdata('user_login_id');
                                         $basicinfo = $this->employee_model->GetBasic($id); ?>
                                    <input type="hidden" name="created_by" value="<?php echo $basicinfo->id ?>" class="form-control" id="recipient-name1">    
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
                    $('.bd-example-modal-lg').modal('show');
                    $.ajax({
                        url: 'Invoicebyib?id=' + iid,
                        method: 'GET',
                        data: '',
                        dataType: 'json',
                    }).done(function (response) {
                        console.log(response);
                        // Populate the form fields with the data returned from server
						$('#roleform').find('[name="id"]').val(response.rolevalue.id).end();
                        $('#roleform').find('[name="vehicle_id"]').val(response.rolevalue.vehicle_id).end();
                          $('#roleform').find('[name="model"]').val(response.rolevalue.model).end();
                          $('#roleform').find('[name="number_plate"]').val(response.rolevalue.number_plate).end();
                          $('#roleform').find('[name="amount"]').val(response.rolevalue.amount).end();
                          $('#roleform').find('[name="service_type"]').val(response.rolevalue.service_type).end();
                          $('#roleform').find('[name="inov_num"]').val(response.rolevalue.inov_num).end();
                      
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
                url: 'qvalueDelet?id=' + iid,
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
<script type="text/javascript">
        $(document).ready(function () {
            $("#pp").change(function (e) {
                
                e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = this.value;
                
                $.ajax({
                    url: 'vehbyib?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).done(function (response) {
                    console.log(response);
                    // Populate the form fields with the data returned from server
                    
                    $('#roleform').find('[name="model"]').val(response.modelvalue.model).end();
                    $('#roleform').find('[name="number_plate"]').val(response.modelvalue.number_plate).end();
                    
                });
            });
        });
</script>

<?php $this->load->view('backend/footer'); ?>



                        