<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<?php
  
    foreach($pos as $value) { 
        $vehicle_name = $value->vehicle_name;
        $pos_code = $value->pos_code;
        $vehicle_price = $value->vehicle_price;
        $model = $value->model;
        $qty = $value->qty;
          $total = $value->total;
        $number_plate = $value->number_plate;
        $need_item = $value->need_item;
          $tax = $value->tax;
    // print_r($pos_code);
} 
    ?>

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
         
                
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="tab-content">
                                                     
                                <div class="tab-pane active" id="pos" role="tabpanel">
                             
                                      <div class="card-body">

                                      <div class="row" id="addon">
                                <div class="col-md-1"></div>
                                      <div class="col-md-12">
                                      <div class="card">
                                      <div class="col-md-10 mt-3">
                                      <a href="<?php echo base_url(); ?>customer/posview?I=<?php echo base64_encode($basic->id) ?>" title="Edit"  class="btn btn-info waves-effect waves-light  float-right" "><i class="fa fa-pencil-square-o"></i>List of Po's </a>                    

                                    
                                      </div>   
                                      <div class="card-body">
                                         <h4 class="text-center p-b-3" style="color:#13637c">Edit Po's Items: </h4>
                                                                                 
                                         <form method="post" action="Add_Vehicle" id="roleform" enctype="multipart/form-data">
                                            <div class="modal-body row">
                                            <?php
                                                $sql = "SELECT * FROM `tbl_vehicle`  WHERE id='$vehicle_name'";
                                                $query=$this->db->query($sql);
                                                $result = $query->result();       
                                                foreach($result as $value1){ 
                                                    $name1=$value1->vehicle_name;
                                                                                        
                                                }     
                                               ?>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Name of Vehicle</label>
                                                    <select name="vehicle_name" class="form-control custom-select" id="pp" required>
                                                    <option value="<?php echo $vehicle_name ?>"><?php echo $name1 ?></option>
                                                        <?Php foreach($vehiclevalue as $value){ ?>
                                                        <option value="<?php echo $value->id ?>"><?php echo $value->vehicle_name ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Vehicle Model</label>
                                                    <input type="text" name="model" class="form-control" id="recipient-name1" value="<?php echo $model ?>" required>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">Number Plate</label>
                                                    <input type="text" name="number_plate" class="form-control" id="recipient-name1"  value="<?php echo $number_plate ?>" required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="control-label">Vehicle Price</label>
                                                    <input type="text" name="vehicle_price" class="form-control price1" id="recipient-name1" value="<?php echo $number_plate ?>"  required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="control-label">Qty</label>
                                                    <input type="text" name="qty" class="form-control qty1" id="recipient-name1" value="<?php echo $qty ?>" required>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="control-label">Total</label>
                                                    <input type="text" name="total" class="form-control total1" id="recipient-name1" value="<?php echo $total ?>" required>
                                                    <input type="hidden" name="cid" class="form-control" id="recipient-name1" value="<?php echo $basic->id; ?>" required>
                                                    <input type="hidden" name="id" value="" class="form-control" id="recipient-name1">      
                                                </div>
                                                 <div class="form-group col-md-2">
                                                    <label class="control-label">Tax (%)</label>
                                                    <input type="text" name="tax" class="form-control" id="recipient-name1" value="<?php echo $tax ?>" required>
                                                </div>
                                                  <div class="form-group col-md-2">
                                                    <label class="control-label">Need Items</label>
                                                    <input type="text" name="need_item" class="form-control" id="recipient-name1" value="<?php echo $need_item ?>" readonly>
                                                </div>

                                             <!--   <div class="form-group col-md-2">-->
                                             <!--       <label class="control-label">Need Items</label>-->
                                             <!--   <select name="need_item" id="need_item" class="form-control" desiabled>-->
                                             <!--   <option>Select Option</option>-->
                                             <!--   <option value="Yes"<?php if($need_item == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option>-->
                                             <!--<option value="No"<?php if($need_item == 'No') { ?> selected="selected"<?php } ?>>No</option>-->
                                             <!--           </select> -->
                                             <!--   </div>-->

                                        </div>
                                        <div class="modal-footer">
                                      <?php  $id = $this->session->userdata('user_login_id');
                                         $basicinfo = $this->employee_model->GetBasic($id); ?>
                                        <input type="hidden" name="id" value="<?php echo $pos_code; ?>" class="form-control" id="recipient-name1">   
                                         <input type="hidden" name="created_by" value="<?php echo $basicinfo->id ?>" class="form-control" id="recipient-name1">         
                                         
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                 </form>
                           <?php if($need_item == "Yes") { ?>     
                      <div class="row edit_addon">
                                      
                            
                                      <div class="col-md-12">
                                      <div class="card-body">
                                         <h4 class="text-center p-b-3" style="color:#13637c">Add Items: </h4>
                                          <hr>
                                          <form class="row" action="Add_POS_item" method="post" enctype="multipart/form-data">
                                              <div class="form-group col-md-2 m-t-5">
                                                  <label class="">Item<span style="color:red">*</span></label>
                                                  <input type="text" name="vitem" class="form-control"  required>
                                              </div>
                                             
                                              <div class="form-group col-md-2 m-t-5">
                                                  <label class="">Price (₹) <span style="color:red">*</span></label>
                                                  <input type="text" name="vprice" class="form-control vprice" id="price" required>
                                              </div>
                                              <div class="form-group col-md-2 m-t-5">
                                                  <label class="">Qty <span style="color:red">*</span></label>
                                                  <input type="number" name="vqty"  id='qty' class="form-control vqty" required>
                                              </div>
                                              <div class="form-group col-md-2 m-t-5">
                                                  <label class="">Total (₹)<span style="color:red">*</span></label>
                                                  <input type="text" name="vtotal" class="form-control vtotal" id="total" required>
                                              </div>
                                              <div class="form-group col-md-2 m-t-5">
                                                  <label class="">Tax (%)<span style="color:red">*</span></label>
                                                  <input type="text" name="vtax" class="form-control" id="tax" required>
                                              </div>
                                                  
                                              <div class="form-group col-md-2">
                                                  <div class="col-sm-12" style="margin-top:2.5rem">
                                                      <input type="hidden" name="pos_id" value="<?php echo $basic->id; ?>">
                                                      <input type="hidden" name="pos_code" value="<?php echo $pos_code; ?>">     
                                                                                           
                                                      <button type="submit" class="btn btn-success">Save</button>
                                                  </div>
                                              </div>
                                      
                                          </form>
                                  
                                          <div class="table-responsive ">
                                              <table  id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                  <thead>
                                                      <tr>
                                                          <th>SNo </th>
                                                          <th>Item</th>
                                                          <th>QTY </th>
                                                          <th> Price (₹)</th>
                                                          <th>Total (₹)</th>
                                                          <th>Tax (%)</th>
                                                          <th>Action </th>
                                                      </tr>
                                                  </thead>
                                                  
                                                  <tbody>
                                                  <?php 
                                                  $i ='1';
                                                  foreach($pos_item as $value): ?>
                                                      <tr>
                                                          <td><?php echo $i++ ?></td>
                                                          <td><?php echo $value->vitem ?></td>
                                                          <td><?php echo $value->vqty ?></td>
                                                          <td><?php echo $value->vprice ?></td>
                                                          <td><?php echo $value->vtotal ?></td>
                                                          <td><?php echo $value->vtax ?></td>
                                                          <td> <a href="#" title="Delete" class="btn btn-sm btn-info waves-effect waves-light deletexp" data-id="<?php echo $value->id ?>"><i class="fa fa-trash-o"></i></a></td>
                                                      </tr>
                                                      <?php endforeach; ?>
                                                  </tbody>
                                              </table>
                                          </div>
                                
                                       </div>   
                                     </div>
                                    
                              </div>

<?php } ?>
                                       </div>   
                                     </div>
                                </div>   
                                <div class="col-md-1"></div>
                              </div>
                                   
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



                        