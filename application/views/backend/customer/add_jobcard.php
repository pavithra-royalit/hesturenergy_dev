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
            <?php $vehiclevalue = $this->vehicle_model->GetAllVehInfo(); ?>
            <div class="container-fluid">
                <div class="row">
                <div class="col-1 col-md-1 col-lg-1"></div>
                    <div class="col-10 col-md-10 col-lg-10">
                        <div class="card">
                            <!-- Nav tabs -->

                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link "  href="<?php echo base_url(); ?>customer/customerview?I=<?php echo base64_encode($basic->id); ?>"  style="font-size: 14px;"> Customer Info </a> </li>
                                <li class="nav-item"> <a class="nav-link"  href="<?php echo base_url(); ?>customer/posview?I=<?php echo base64_encode($basic->id); ?>"  style="font-size: 14px;"> Po's </a> </li>
                                 <li class="nav-item"> <a class="nav-link"  href="<?php echo base_url(); ?>customer/invoiceview?I=<?php echo base64_encode($basic->id); ?>" style="font-size: 14px;"> Invoice </a> </li>
                                <li class="nav-item"> <a class="nav-link active"  href="<?php echo base_url(); ?>customer/jobcardview?I=<?php echo base64_encode($basic->id); ?>"  style="font-size: 14px;"> Job Card</a> </li>
                                <li class="nav-item"> <a class="nav-link"  href="<?php echo base_url(); ?>customer/notesview?I=<?php echo base64_encode($basic->id); ?>"  style="font-size: 14px;"> Notes</a> </li>
                              
                            </ul>

                            </div>
                    </div>
                    <div class="col-1 col-md-1 col-lg-1"></div>
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="tab-content">
                       
                          
                         <!--job card code start -->
                              <div class="tab-pane active" id="jobcard" role="tabpanel">
                                <div class="card-body">
			                              <!-- job card code start -->

                                          <div class="row" id="addon">
                                <div class="col-md-1"></div>
                                      <div class="col-md-10">
                                      <div class="card">
                                           <a href="<?php echo base_url(); ?>customer/jobcardview?I=<?php echo base64_encode($basic->id) ?>" title="Edit"  class="btn btn-sm btn-info waves-effect waves-light mt-3" style="width:150px;margin-left:10px;"><i class="fa fa-pencil-square-o"></i> List of Job Card </a>
                                      <div class="card-body">
                                         <h4 class="text-center p-b-3" style="color:#13637c">Add Job Card: </h4>

                                         <form method="post" action="Add_jobcard"  id="roleform">
                                            <div class="modal-body row">
                                            
                                               
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">In Date/Time</label>
                                                    <input type="datetime-local" name="indate" class="form-control" id="recipient-name1" value="" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">Out Date/Time</label>
                                                    <input type="datetime-local" name="outdate" class="form-control" id="recipient-name1" value="" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">KMS Run</label>
                                                    <input type="text" name="kmsrun" class="form-control price1" id="recipient-name1" value=""  required>
                                                </div>
                                                  <div class="form-group col-md-3">
                                                    <label class="control-label">Service Type</label>
                                                    <select class="form-control" name="service_type">
                                                    <option value="Paid">Paid</option>
                                                    <option value="Free">Free</option>
                                                    </select>
                                                </div>
                                                 <div class="form-group col-md-12">
                                                <h5>Customer Details</h5>
                                                        </div>
                                                         <div class="form-group col-md-4">
                                                    <label class="control-label">Customer Name</label>
                                                    <input type="text" class="form-control qty1" id="recipient-name1" value="<?php echo $basic->name; ?>" readonly>
                                                </div>
                                                 <div class="form-group col-md-4">
                                                    <label class="control-label">Customer Email</label>
                                                    <input type="text"  class="form-control qty1" id="recipient-name1" value="<?php echo $basic->email; ?>" readonly>
                                                </div>
                                                 <div class="form-group col-md-4">
                                                    <label class="control-label">Customer Mobile</label>
                                                    <input type="text"  class="form-control qty1" id="recipient-name1" value="<?php echo $basic->phone; ?>" readonly>
                                                </div>
                                                <div class="form-group col-md-12">
                                                <h5>Vehicle Details</h5>
                                                        </div>
                                                        
                                                          <div class="form-group col-md-4">
                                                    <label class="control-label">Name of Vehicle</label>
                                                    <select name="vehicle" class="form-control custom-select" id="pp" required>
                                                        <option value="">Select Vehicle</option>
                                                        <?Php foreach($numberplate as $value){ 

                                                             $sql = "SELECT * FROM `quotation`  WHERE number_plate='$value->number_plate'";
                                                             $query=$this->db->query($sql);
                                                             $result = $query->result();       
                                                             foreach($result as $value1){ 
                                                                 $vehid=$value1->vehicle_name;
                                                                                                     
                                                             }     
                                                              $sql = "SELECT * FROM `tbl_vehicle`  WHERE id='$vehid'";
                                                             $query=$this->db->query($sql);
                                                             $result = $query->result();       
                                                             foreach($result as $value1){ 
                                                                 $name1=$value1->vehicle_name;
                                                                                                     
                                                             }     
                                                            ?>
                                                        <option value="<?php echo $vehid ?>"><?php echo $value->number_plate ?>(<?php echo $name1 ?>)</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                        
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Model Name</label>
                                                    <input type="text" name="model" class="form-control " id="recipient-name1" value="" required>
                                                </div>
                                                 <div class="form-group col-md-4">
                                                    <label class="control-label">Number Plate</label>
                                                    <input type="text" name="number_plate" class="form-control " id="recipient-name1" value="" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Chasis No</label>
                                                    <input type="text" name="chasis" class="form-control " id="recipient-name1" value="" required>
                                                </div>
                                                
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Engine No</label>
                                                    <input type="text" name="enginno" class="form-control qty1" id="recipient-name1" value="" required>
                                                    <input type="hidden" class="form-control"  name="cid" value="<?php echo $basic->id; ?>">
                                                     <?php  $id = $this->session->userdata('user_login_id');
                                         $basicinfo = $this->employee_model->GetBasic($id); ?>
                                                      <input type="hidden" name="created_by" value="<?php echo $basicinfo->id ?>" class="form-control" id="recipient-name1">    
                                                </div>
                                               <div class="form-group col-md-4">
                                                    <label class="control-label">Status</label>
                                                    <select class="form-control" name="status">
                                                    <option value="Open">Open</option>
                                                    <option value="Completed">Completed</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group col-md-12">
                                                <h5>Other Service Charges</h5>
                                                        </div>

                                            
                                                <div class="col-md-12">
                                        
                                                <div id="dynamic_field1" class="row repeater1">
                                                    <div class="form-group col-md-5">
                                                    <label class="control-label " for="name">Product:</label>
                                                
                                                        <input type="text" class="form-control pitem" id="item" placeholder="Enter item" name="pitem[]" required>
                                                
                                                    </div>
                                                    
                                                  
                                                    
                                                    <div class="form-group col-md-4">
                                                    <label class="control-label " for="mobno">Price:</label>
                                                        
                                                        <input type="number" class="form-control pprice" id="price" placeholder="Enter price" name="pprice[]" required>
                                                        <input type="hidden" class="form-control"name="c_id[]" value="<?php echo $basic->id; ?>">
                                                    </div>
                                                                                            
                                            
                                                    <div class="form-group col-md-2">        
                                                
                                                        <button type="button" name="add" id="add1" class="btn btn-success mt-4"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                                    
                                                    </div>
                                                    </div>  
                                        </div>               
                                            
                                        </div>
                                        <div class="modal-footer">
                                        <input type="hidden" name="id" value="" class="form-control" id="recipient-name1">                                       
                                  
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                 </form>

                                
                                       </div>   
                                     </div>
                                </div>   
                                <div class="col-md-1"></div>
                              </div>

                                          <!-- job card code end -->
                                </div>
                            </div>
                           
                              <!--job card code emd -->
                           
                           
                 
                            
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
                            url: 'pocvalueDelet?id=' + iid,
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
                                         



<script>

$(".qty1").keyup(function () {					 
					 var qty = this.value;
					 var price = $(".price1").val();
                     var total = Number(price) * Number(qty)
                     $(".total1").val(total);
		
		
					 
                });
                $(".vqty").keyup(function () {					 
					 var qty1 = this.value;
					 var price1 = $(".vprice").val();
                     var total1 = Number(price1) * Number(qty1)
                     $(".vtotal").val(total1);
		
		
					 
                });

</script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script> -->

<script>
   
$(document).ready(function () {
  // debugger;
  $(".repeater").hide();

  $("#need_item").change(function () {
    // debugger;
    if ($("#need_item").val() == "Yes") {
      $(".repeater").show();
    }else{
        $(".repeater").hide();
    }
    });
});
</script>

<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
      $('#add1').click(function(){  
           i++;             
           $('#dynamic_field1').append('<div id="row'+i+'"><div class="form-group col-md-12"><label class="control-label " for="name">Item:</label><input type="text" class="form-control pitem"  placeholder="Enter item" name="pitem[]" autocomplete="off" style="width:350px;"></div></div><div class="form-group col-md-4"><label class="control-label " >Price:</label><input type="number" class="form-control pprice" id="price" placeholder=" Price" name="pprice[]" autocomplete="off"><input type="hidden" class="form-control" id="total" value="<?php echo $basic->id; ?>" name="c_id[]" ></div></div></div></div>');
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



                        