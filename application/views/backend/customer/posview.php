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
                           
                            <!--second tab-->
                          
                                <div class="tab-pane active" id="pos" role="tabpanel">
                                <div class="row" id="addon">
                                <div class="col-md-1"></div>
                                      <div class="col-md-10">
                                      <div class="card">
                                      <div class="card-body">
                                         <h4 class="text-center p-b-3" style="color:#13637c"> Po's List  </h4>

                                         <a href="<?php echo base_url(); ?>customer/addPos?I=<?php echo base64_encode($basic->id) ?>" title="Edit"  class="btn btn-info waves-effect waves-light  float-right" "><i class="fa fa-pencil-square-o"></i>Add Po's </a>

                                                                                                     
                                         <div class="table-responsive ">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                                  <thead>
                                                      <tr>
                                                          <th>SNo </th>
                                                          <th>Vehicle Name </th>
                                                          <th>Model </th>
                                                          <!--<th>Number Plate </th>-->
                                                          <!--<th> Price (₹)</th>-->
                                                          <!--<th> Qty</th>-->
                                                          <th>Total (₹)</th>
                                                          <th>Action </th>
                                                      </tr>
                                                  </thead>
                                                  
                                                  <tbody>
                                                  <?php
                                           $i=1;
                                           foreach($vehicle as $value) { 
                                            $pos_code = $value->pos_code;
                                            $sql = "SELECT * FROM `tbl_vehicle`  WHERE id='$value->vehicle_name'";
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
                                                <!--<td><?php echo $value->number_plate ?></td>-->
                                                <!--<td><?php echo $value->vehicle_price ?></td>-->
                                                <!--<td><?php echo $value->qty ?></td>-->
                                                <td><?php echo $value->total ?></td>
                                              
                                                <td class="jsgrid-align-center ">

                                                
                                                    <a href="<?php echo base_url(); ?>customer/edit_pos?I=<?php echo base64_encode($basic->id) ?>&id=<?php echo $value->pos_code ?>" title="Edit"  class="btn btn-sm btn-primary waves-effect waves-light " "><i class="fa fa-pencil-square-o"></i></a>

                                                  <a href="<?php echo base_url(); ?>customer/view_pos?I=<?php echo base64_encode($basic->id) ?>&id=<?php echo $value->pos_code ?>" title="View"  class="btn btn-sm btn-info waves-effect waves-light " "><i class="fa fa-eye"></i></a>

                                                    <!--<a href="<?php echo base_url(); ?>customer/view_invoice?I=<?php echo base64_encode($basic->id) ?>&id=<?php echo $value->pos_code ?>" title="Invoice"  class="btn btn-sm btn-warning waves-effect waves-light " "><i class="fa fa-file"></i></a>-->
<a href="#" title="Save as Invoice"  class="btn btn-sm btn-warning waves-effect waves-light " "><i class="fa fa-file"></i></a>

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
                                <div class="col-md-1"></div>
                              </div>
                                   
                            </div>                    
                    
                          
                           
                        
                       
                        </div>
                    </div>
                    </div>
                    <!-- Column -->
                </div>
          
 

          <div class="modal fade" id="holysmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel1">Notes</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <form method="post" action="Add_Notes" id="roleform" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        
                                            <div class="form-group">
                                                <label class="control-label">Title</label>
                                                <input type="text" name="title" class="form-control" id="recipient-name1" value="" required>
                                            </div>
                                             <div class="form-group">
                                                <label class="control-label">Description</label>
                                                  <textarea name="description" class="form-control" id="recipient-name1" value="" required></textarea>
                                       
                                            </div>                
                                        
                                    </div>
                                    <div class="modal-footer">
                                    <input type="hidden" name="id" value="" class="form-control" id="recipient-name1">     
                                     <input type="hidden" name="cid" value="<?php echo $basic->id ?>" class="form-control" id="recipient-name1">                                       
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                                             



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


<?php $this->load->view('backend/footer'); ?>



                        