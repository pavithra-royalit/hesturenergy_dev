<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<?php
$sql = "SELECT * FROM `customer`  WHERE id='$cid'";
  $query=$this->db->query($sql);
   $result = $query->result();       
   foreach($result as $value1){ 
     $name=$value1->name;
     }
     ?>
     <?php
$sql = "SELECT * FROM `tbl_quotation`  WHERE customer_id='$cid'";
  $query=$this->db->query($sql);
   $result = $query->result();       
   $result1 = count($query->result());    
   foreach($result as $value){ 
     $pp=$value->id;
     }
 
     ?>
      <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-university" aria-hidden="true"></i> Quotation</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Quotation</li>
                    </ol>
                </div>
            </div>
            <div class="message"></div>

            <div class="container-fluid">
                <!-- <div class="row m-b-10"> 
                    <div class="col-12">
                    <button type="button" class="btn btn-info"><i class="fa fa-bars"></i><a href="<?php echo base_url(); ?>pos/pos?I=<?php echo $cid; ?>" class="text-white"><i class="" aria-hidden="true"></i>  Quotation List</a></button>
                     
                    </div>
                </div> -->
               <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"><i class="fa fa-user-o" aria-hidden="true"></i> Add New Quotation<span class="pull-right " ></span></h4>
                            </div>
                           
                            <div class="card-body">
                            <?php $vehiclevalue = $this->vehicle_model->GetAllVehInfo(); ?>
                          <?php if($result1 !='0'){ ?>
                                <form class="row" method="post" action="Add_Pos" enctype="multipart/form-data">
                                    <div class="form-group col-md-3 m-t-20">
                                    <label>Customer Name</label>
                                           <input type="text" name="customer_id" class="form-control form-control-line" minlength="2" value="<?php echo $name ?>" > 
                                    </div>
                                    <div class="form-group col-md-2 m-t-20">
                                    <label class="control-label">Date</label>
                                       <input type="date" name="date" class="form-control " id="recipient-name1"  value="<?php echo $basic->date; ?>" required>
                                    </div>
                               
                                 
                                    <div class="form-group col-md-3 m-t-20">
                                    <label class="control-label">Vehicle Name</label>

                                    <select name="vehicle_name"  class="form-control custom-select" required>
                                    <?php $sql = "SELECT * FROM `tbl_vehicle`  WHERE id='$basic->vehicle_name'";
                                        $query=$this->db->query($sql);
                                        $result = $query->result();       
                                        foreach($result as $value1){ 
                                            $name1=$value1->vehicle_name;
                                                                                  
                                        }  ?>    

				                          <option value="<?php echo $basic->id; ?>"><?php echo $name1; ?></option>
                                            <?Php foreach($vehiclevalue as $value): ?>
                                             <option value="<?php echo $value->id ?>"><?php echo $value->vehicle_name ?></option>
                                            <?php endforeach; ?>
				                                        </select>

                                         <!-- <input type="text" name="vehicle_name" class="form-control " id="recipient-name1" value="<?php echo $basic->vehicle_name; ?>" required> -->
                                    </div>
                                  
                                  
                                    <!-- <div class="form-group col-md-3 m-t-20">
                                    <label class="control-label">Vehicle Price</label>
                                         <input type="text" name="vehicle_price" class="form-control " id="recipient-name1" value="<?php echo $basic->vehicle_price; ?>" required>
                                    </div>
                                 
                                    <div class="form-group col-md-3 m-t-20">
                                    <label class="control-label">Number Plate</label>
                                         <input type="text" name="number_plate" class="form-control " id="recipient-name1" value="<?php echo $basic->number_plate; ?>" required>
                                    </div>
                                     -->
                                 
                                    <div class="form-group col-md-2 m-t-20">
                                    <label class="control-label">Service Type</label>
                                            <select name="service_type" class="form-control custom-select" required>
                                                <?php if($basic->service_type !=''){ ?>
                                          <option value="<?php echo $basic->service_type; ?>"><?php echo $basic->service_type; ?></option>
                                          <?php } else { ?>
                                          <option>Select Service Type</option>
                                          <?php } ?>
                                            <option value="Free">Free</option>
                                            <option value="Paid">Paid</option>
                                        </select>
                                    </div>
                                      <div class="form-group col-md-2 m-t-20">
                                      <label class="control-label">Fix Service Charge</label>
                                         <input type="number" name="fixed_service_charge" class="form-control " id="recipient-name1" value="<?php echo $basic->fixed_service_charge; ?>" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                            <label for="message-text" class="control-label">Details</label>
                                           <textarea class="form-control " name="details" id="message-text1" required><?php echo $basic->details; ?></textarea>
                                            </div>  
                                          
                                            <div class="form-actions col-md-12">
                                      <input type="hidden" name="q_id" value="<?php echo $basic->id; ?>" >
                                    <input type="hidden" name="em_id" value="<?php echo $cid; ?>">   
                                    <?php if($basic->customer_id != $cid){ ?>
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                    <?php } else {?>
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update</button>
                                  <?php  } ?>
                                    </div>

                                           </div>
                                 
                                </form>
                                <?php } else { ?>
                                    
                                    <form class="row" method="post" action="Add_Pos" enctype="multipart/form-data">
                                    <div class="form-group col-md-3 m-t-20">
                                    <label>Customer Name</label>
                                           <input type="text" name="customer_id" class="form-control form-control-line" minlength="2" value="<?php echo $name ?>" > 
                                    </div>
                                    <div class="form-group col-md-2 m-t-20">
                                    <label class="control-label">Date</label>
                                       <input type="date" name="date" class="form-control " id="recipient-name1"  value="" required>
                                    </div>
                               
                                 
                                    <div class="form-group col-md-3 m-t-20">
                                    <label class="control-label">Vehicle Name</label>

                                    <select name="vehicle_name" class="form-control custom-select" required>
                                            <option>Select Vehicle</option>
                                            <?Php foreach($vehiclevalue as $value): ?>
                                            <option value="<?php echo $value->id ?>"><?php echo $value->vehicle_name ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                         <!-- <input type="text" name="vehicle_name" class="form-control " id="recipient-name1" value="" required> -->
                                    </div>
                                  
                                  
                                    <!-- <div class="form-group col-md-3 m-t-20">
                                    <label class="control-label">Vehicle Price</label>
                                         <input type="text" name="vehicle_price" class="form-control " id="recipient-name1" value="" required>
                                    </div>
                                 
                                    <div class="form-group col-md-3 m-t-20">
                                    <label class="control-label">Number Plate</label>
                                         <input type="text" name="number_plate" class="form-control " id="recipient-name1" value="" required>
                                    </div>
                                     -->
                                 
                                    <div class="form-group col-md-2 m-t-20">
                                    <label class="control-label">Service Type</label>
                                            <select name="service_type" class="form-control custom-select" required>
                                              
                                          <option>Select Service Type</option>
                                     
                                            <option value="Free">Free</option>
                                            <option value="Paid">Paid</option>
                                        </select>
                                    </div>
                                      <div class="form-group col-md-2 m-t-20">
                                      <label class="control-label">Fix Service Charge</label>
                                         <input type="number" name="fixed_service_charge" class="form-control " id="recipient-name1" value="" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                            <label for="message-text" class="control-label">Details</label>
                                           <textarea class="form-control " name="details" id="message-text1" required></textarea>
                                            </div>  
                                          
                                            <div class="form-actions col-md-12">
                                 
                                    <input type="hidden" name="em_id" value="<?php echo $cid; ?>">   
                                    <?php if($result1 == 0){ ?>
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save & Continue</button>
                                    <?php } else {?>
                                        <input type="hidde" name="q_id" value="<?php echo $pp; ?>" >
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update</button>
                                  <?php  } ?>
                                    </div>

                                           </div>
                                 
                                </form>
                                    <?php } ?>
                                    <?php if($result1 !='0'){ ?>
                                <div class="form-group col-md-12"> <p id="show" style='color: #006666;cursor: pointer;'>Clich Here for Add/View Items</p> </div>

                                <div class="row" id="addon">
                                      
                            
                                      <div class="col-md-12">
                                      <div class="card-body">
                                         <h4 class="text-center p-b-3" style="color:#13637c">Add Po's Items: </h4>
                                          <hr>
                                          <form class="row" action="Add_POS_item" method="post" enctype="multipart/form-data">
                                              <div class="form-group col-md-4 m-t-5">
                                                  <label class="">Item<span style="color:red">*</span></label>
                                                  <input type="text" name="item" class="form-control"  required>
                                              </div>
                                              <div class="form-group col-md-2 m-t-5">
                                                  <label class="">Qty <span style="color:red">*</span></label>
                                                  <input type="number" name="qty"  id='qty' class="form-control" required>
                                              </div>
                                              <div class="form-group col-md-2 m-t-5">
                                                  <label class="">Price (₹) <span style="color:red">*</span></label>
                                                  <input type="text" name="price" class="form-control" id="price" required>
                                              </div>
                                              <div class="form-group col-md-2 m-t-5">
                                                  <label class="">Total (₹)<span style="color:red">*</span></label>
                                                  <input type="text" name="total" class="form-control" id="total" required>
                                              </div>
                                                  
                                              <div class="form-group col-md-2">
                                                  <div class="col-sm-12" style="margin-top:2.5rem">
                                                      <input type="hidden" name="em_id" value="<?php echo $cid; ?>">     
                                                                                           
                                                      <button type="submit" class="btn btn-success">Save</button>
                                                  </div>
                                              </div>
                                      
                                          </form>
                                  
                                          <div class="table-responsive ">
                                              <table  class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                  <thead>
                                                      <tr>
                                                          <th>SNo </th>
                                                          <th>Item</th>
                                                          <th>QTY </th>
                                                          <th> Price (₹)</th>
                                                          <th>Total (₹)</th>
                                                          <th>Action </th>
                                                      </tr>
                                                  </thead>
                                                  
                                                  <tbody>
                                                  <?php 
                                                  $i ='1';
                                                  foreach($pos as $value): ?>
                                                      <tr>
                                                          <td><?php echo $i++ ?></td>
                                                          <td><?php echo $value->item ?></td>
                                                          <td><?php echo $value->qty ?></td>
                                                          <td><?php echo $value->price ?></td>
                                                          <td><?php echo $value->total ?></td>
                                                          <td> <a href="#" title="Delete" class="btn btn-sm btn-info waves-effect waves-light deletexp" data-id="<?php echo $value->id ?>"><i class="fa fa-trash-o"></i></a></td>
                                                      </tr>
                                                      <?php endforeach; ?>
                                                  </tbody>
                                              </table>
                                          </div>
                                
                                       </div>   
                                     </div>
                                    
                              </div>
                              <div class="form-group col-md-4">
                              <a href="<?php echo base_url(); ?>pos/pos_view?id=<?php echo $cid; ?>" title="View" class="btn btn-sm btn-info">Save and Continue</a> 
                              <?php } ?>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
<script>
    $(document).ready(function(){
  $("#addon").hide();
  $("#show").click(function(){
    $("#addon").show();
  });
});
</script>


<script>

$("#price").keyup(function () {					 
					 var price = this.value;
					 var qty = $("#qty").val();
                     var total = Number(price) * Number(qty)
                     $("#total").val(total);
		
		
					 
                });


</script>

<?php $this->load->view('backend/footer'); ?>