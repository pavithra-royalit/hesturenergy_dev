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
                                <li class="nav-item"> <a class="nav-link active"  href="<?php echo base_url(); ?>customer/posview?I=<?php echo base64_encode($basic->id); ?>"  style="font-size: 14px;"> Po's </a> </li>
                                 <li class="nav-item"> <a class="nav-link"  href="<?php echo base_url(); ?>customer/invoiceview?I=<?php echo base64_encode($basic->id); ?>" style="font-size: 14px;"> Invoice </a> </li>
                                <li class="nav-item"> <a class="nav-link"  href="<?php echo base_url(); ?>customer/jobcardview?I=<?php echo base64_encode($basic->id); ?>"  style="font-size: 14px;"> Job Card</a> </li>
                                <li class="nav-item"> <a class="nav-link"  href="<?php echo base_url(); ?>customer/notesview?I=<?php echo base64_encode($basic->id); ?>"  style="font-size: 14px;"> Notes</a> </li>
                              
                            </ul>

                            </div>
                    </div>
                    <div class="col-1 col-md-1 col-lg-1"></div>
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="tab-content">
                        
                          
                                <div class="tab-pane active" id="pos" role="tabpanel">
                                <div class="row" id="addon">
                                <div class="col-md-1"></div>
                                      <div class="col-md-10">
                                      <div class="card">
                                      <div class="card-body">
                                         <h4 class="text-center p-b-3" style="color:#13637c">Add Po's Items: </h4>

                                         <a href="<?php echo base_url(); ?>customer/posview?I=<?php echo base64_encode($basic->id) ?>" title="Edit"  class="btn btn-sm btn-info waves-effect waves-light  float-right" "><i class="fa fa-pencil-square-o"></i>List of Po's </a>

                                         <form method="post" action="Add_Vehicle" id="roleform" enctype="multipart/form-data">
                                            <div class="modal-body row">
                                            
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Name of Vehicle</label>
                                                    <select name="vehicle_name" class="form-control custom-select" id="pp" required>
                                                        <option>Select Vehicle</option>
                                                        <?Php foreach($vehiclevalue as $value): ?>
                                                        <option value="<?php echo $value->id ?>"><?php echo $value->vehicle_name ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Vehicle Model</label>
                                                    <input type="text" name="model" class="form-control" id="recipient-name1" value="" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Number Plate</label>
                                                    <input type="text" name="number_plate" class="form-control" id="recipient-name1" value="" required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="control-label">Vehicle Price</label>
                                                    <input type="text" name="vehicle_price" class="form-control price1" id="recipient-name1" value=""  required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="control-label">Qty</label>
                                                    <input type="text" name="qty" class="form-control qty1" id="recipient-name1" value="" required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="control-label">Total</label>
                                                    <input type="text" name="total" class="form-control total1" id="recipient-name1" value="" required>
                                                    <input type="hidden" name="cid" class="form-control" id="recipient-name1" value="<?php echo $basic->id; ?>" required>
                                                    <input type="hidden" name="id" value="" class="form-control" id="recipient-name1"> 
                                                       <?php  $id = $this->session->userdata('user_login_id');
                                         $basicinfo = $this->employee_model->GetBasic($id); ?>
                                                      <input type="hidden" name="created_by" value="<?php echo $basicinfo->id ?>" class="form-control" id="recipient-name1">    
                                                </div>
                                               <div class="form-group col-md-2">
                                                    <label class="control-label">Tax (In %)</label>
                                                    <input type="number" name="tax" class="form-control" id="recipient-name1" value="" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="control-label">Need Items</label>
                                                <select name="need_item" id="need_item" class="form-control">
                                                <option>Select </option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                        </select> 
                                                </div>

                                            
                                                <div class="col-md-12" id="addon">
                                        
                                                <div id="dynamic_field" class="row repeater">
                                                    <div class="form-group col-md-3">
                                                    <label class="control-label " for="name">item:</label>
                                                
                                                        <input type="text" class="form-control vitem" id="item" placeholder="Enter item" name="vitem[]" required>
                                                
                                                    </div>
                                                    
                                                  
                                                    
                                                    <div class="form-group col-md-2">
                                                    <label class="control-label " for="mobno">Price:</label>
                                                        
                                                        <input type="number" class="form-control vprice" id="price" placeholder="Enter price" name="vprice[]" required>
                                                
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                    <label class="control-label " for="email">qty:</label>
                                            
                                                        <input type="number" class="form-control vqty" id="qty" placeholder="Enter qty" name="vqty[]" required>
                                                
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                    <label class="control-label " for="mobno">Total:</label>
                                                        
                                                        <input type="text" class="form-control vtotal" id="total" placeholder="Enter Total" name="vtotal[]" required>
                                                        <input type="hidden" class="form-control" id="total" placeholder="Enter Total" name="pos_id[]" value="<?php echo $basic->id; ?>">
                                                
                                                    </div>
                                            <div class="form-group col-md-2">
                                                    <label class="control-label " for="email">Tax (%)</label>
                                            
                                                        <input type="number" class="form-control" id="tax" placeholder="Enter Tax" name="vtax[]" required>
                                                
                                                    </div>
                                            
                                                    <div class="form-group col-md-1">        
                                                
                                                        <button type="button" name="add" id="add" class="btn btn-success mt-4"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                                    
                                                    </div>
                                                    </div>  
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
                                <div class="col-md-1"></div>
                              </div>
                                   
                            </div>                    
                       
                        </div>
                    </div>
                    </div>
                    <!-- Column -->
                </div>
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
<script type="text/javascript">
    $(document).ready(function(){      
      var i=1;  
   
      $('#add').click(function(){  
           i++;             
                  $('#dynamic_field').append('<div id="row'+i+'"><div class="form-group col-md-12"><label class="control-label " for="name">Item:</label><input type="text" class="form-control vitem"  placeholder="Enter item" name="vitem[]" autocomplete="off" style="width:200px;"></div></div><div class="form-group col-md-2"><label class="control-label " >Price:</label><input type="number" class="form-control vprice" id="price" placeholder=" Price" name="vprice[]" autocomplete="off"></div><div class="form-group col-md-2"><label class="control-label " for="qty">Qty:</label><input type="number" class="form-control vqty" id="qty"  name="vqty[]" autocomplete="off"></div><div class="form-group col-md-2"><label class="control-label " for="mobno">Total:</label><input type="text" class="form-control vtotal" id="total" placeholder="Enter Total" name="vtotal[]" autocomplete="off"></div><div class="form-group col-md-2"><label class="control-label " for="mobno">Tax (In %)</label><input type="text" class="form-control" id="tax" placeholder="Enter Tax" name="vtax[]" autocomplete="off"><input type="hidden" class="form-control" value="<?php echo $basic->id; ?>" name="pos_id[]" ></div></div></div></div>');
     });
     
     $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id"); 
           var res = confirm('Are You Sure You Want To Delete This?');
           if(res==true){
           $('#row'+button_id+'').remove();  
           $('#'+button_id+'').remove();  
           }
      });  
  
    });  
</script>

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
        $(document).ready(function () {
            $("#pp").change(function (e) {
                
                e.preventDefault(e);
                // Get the record's ID via attribute  
                var iid = this.value;
                
                $.ajax({
                    url: 'moodelbyib?id=' + iid,
                    method: 'GET',
                    data: '',
                    dataType: 'json',
                }).done(function (response) {
                    console.log(response);
                    // Populate the form fields with the data returned from server
                    
                    $('#roleform').find('[name="model"]').val(response.modelvalue.model).end();
                    
                });
            });
        });
</script>

<?php $this->load->view('backend/footer'); ?>



                        